const path = require("path");
const fs = require("fs-extra");
const { useMultiFileAuthState } = require("@whiskeysockets/baileys");
const { logger } = require("../utils/logger");

const SESSION_DIR = path.join(process.cwd(), "sessions", "auth_info_baileys");
const BACKUP_DIR = path.join(process.cwd(), "sessions", "backups");
const LOCK_FILE = path.join(process.cwd(), "sessions", ".lock");

let lockAcquired = false;
let backupInterval = null;

/**
 * Parse the lock file content into a positive process id.
 * Returns null when the lock content is empty or invalid.
 * Keeps lock validation tolerant of older malformed lock files.
 */
function parseLockOwner(rawPid) {
  const pid = Number(String(rawPid || "").trim());
  return Number.isInteger(pid) && pid > 0 ? pid : null;
}

/**
 * Check whether a process id is currently alive.
 * Uses process.kill(pid, 0), which does not terminate the process.
 * Treats permission errors as proof that the process exists.
 */
function isProcessRunning(pid) {
  try {
    process.kill(pid, 0);
    return true;
  } catch (error) {
    return error.code === "EPERM";
  }
}

/**
 * Decide whether an existing session lock can be reclaimed.
 * Invalid owners, dead owners, and old locks are considered stale.
 * The current process's own lock is never treated as stale.
 */
function isLockStale({ ownerPid, mtimeMs }) {
  if (!ownerPid) {
    return true;
  }

  if (ownerPid === process.pid) {
    return false;
  }

  return Date.now() - mtimeMs >= 300000 || !isProcessRunning(ownerPid);
}

/**
 * Acquire file lock to prevent concurrent session access.
 * Creates a lock file to signal session is in use.
 * Returns true if lock acquired successfully.
 */
async function acquireLock() {
  try {
    if (lockAcquired) {
      return true;
    }

    if (await fs.pathExists(LOCK_FILE)) {
      const ownerPid = parseLockOwner(await fs.readFile(LOCK_FILE, "utf8"));
      const { mtimeMs } = await fs.stat(LOCK_FILE);
      const isOwnLock = ownerPid === process.pid;
      const staleLock = isLockStale({ ownerPid, mtimeMs });

      if (isOwnLock) {
        lockAcquired = true;
        return true;
      }

      if (!staleLock) {
        logger.warn(`Session lock is held by PID ${ownerPid || "unknown"}`);
        return false;
      }

      await fs.remove(LOCK_FILE);
      logger.warn(
        ownerPid ? `Removed stale session lock from PID ${ownerPid}` : "Removed invalid session lock file",
      );
    }

    await fs.ensureDir(path.dirname(LOCK_FILE));
    await fs.writeFile(LOCK_FILE, String(process.pid));
    lockAcquired = true;
    return true;
  } catch (error) {
    logger.error(`Failed to acquire lock: ${error.message}`);
    return false;
  }
}

/**
 * Release file lock when session is no longer in use.
 * Removes lock file safely.
 * Safe to call multiple times.
 */
async function releaseLock() {
  if (!lockAcquired) return;

  try {
    if (await fs.pathExists(LOCK_FILE)) {
      const ownerPid = parseLockOwner(await fs.readFile(LOCK_FILE, "utf8"));
      if (!ownerPid || ownerPid === process.pid) {
        await fs.remove(LOCK_FILE);
      }
    }
    lockAcquired = false;
  } catch (error) {
    logger.warn(`Failed to release lock: ${error.message}`);
  }
}

/**
 * Create backup of current session files.
 * Stores backup with timestamp for recovery.
 * Returns backup directory path.
 */
async function backupSession() {
  try {
    if (!(await fs.pathExists(SESSION_DIR))) return null;

    const timestamp = new Date().toISOString().replace(/[:.]/g, "-");
    const backupPath = path.join(BACKUP_DIR, `session_${timestamp}`);

    await fs.ensureDir(BACKUP_DIR);
    await fs.copy(SESSION_DIR, backupPath);

    const backups = (await fs.readdir(BACKUP_DIR))
      .filter((name) => name.startsWith("session_"))
      .sort()
      .reverse();

    await Promise.all(
      backups.slice(5).map((old) => fs.remove(path.join(BACKUP_DIR, old)))
    );

    logger.info(`Session backed up to ${backupPath}`);
    return backupPath;
  } catch (error) {
    logger.error(`Failed to backup session: ${error.message}`);
    return null;
  }
}

/**
 * Restore session from the most recent backup.
 * Used for auto-recovery from corrupted session.
 * Returns true if restoration successful.
 */
async function restoreFromBackup() {
  try {
    await fs.ensureDir(BACKUP_DIR);
    const backups = (await fs.readdir(BACKUP_DIR))
      .filter((name) => name.startsWith("session_"))
      .sort()
      .reverse();

    if (!backups.length) {
      logger.warn("No backup available for restoration");
      return false;
    }

    const latestBackup = path.join(BACKUP_DIR, backups[0]);
    await fs.remove(SESSION_DIR);
    await fs.copy(latestBackup, SESSION_DIR);

    logger.info(`Session restored from ${backups[0]}`);
    return true;
  } catch (error) {
    logger.error(`Failed to restore from backup: ${error.message}`);
    return false;
  }
}

/**
 * Validate session integrity by checking key files.
 * Returns true if session appears valid.
 * Checks for required Baileys files.
 */
async function validateSession() {
  try {
    const credsPath = path.join(SESSION_DIR, "creds.json");
    
    // If creds.json doesn't exist, it's a fresh session (not corrupted)
    if (!(await fs.pathExists(credsPath))) {
      return true; // Fresh session is valid
    }

    // If creds.json exists, check if it's readable JSON
    const creds = await fs.readJson(credsPath);
    
    // Check if registered field exists (indicates valid session)
    if (typeof creds.registered === 'boolean') {
      return true;
    }

    return false;
  } catch (error) {
    // If we can't read the file, it might be corrupted
    return false;
  }
}

/**
 * Clear corrupted session and prepare for fresh login.
 * Creates backup before clearing.
 * Safe operation with error handling.
 */
async function clearCorruptedSession() {
  try {
    if (await fs.pathExists(SESSION_DIR)) {
      await backupSession();
      await fs.remove(SESSION_DIR);
    }
    
    logger.info("Corrupted session cleared");
    return true;
  } catch (error) {
    logger.error(`Failed to clear session: ${error.message}`);
    return false;
  }
}

/**
 * Initialize Baileys multi-file auth state with enhanced handling.
 * Includes session validation and auto-recovery.
 * Returns { state, saveCreds }.
 */
async function initAuthState() {
  try {
    const lockSuccess = await acquireLock();
    if (!lockSuccess) {
      throw new Error("Could not acquire session lock. Another instance may be running.");
    }

    await fs.ensureDir(SESSION_DIR);

    if (await fs.pathExists(SESSION_DIR)) {
      const isValid = await validateSession();
      if (!isValid) {
        logger.warn("Invalid session detected, attempting restoration");
        const restored = await restoreFromBackup();
        if (!restored) {
          logger.warn("No backup available, clearing session for fresh login");
          await clearCorruptedSession();
        }
      }
    }

    const authState = await useMultiFileAuthState(SESSION_DIR);

    if (!backupInterval) {
      backupInterval = setInterval(async () => {
        await backupSession();
      }, 10 * 60 * 1000);
    }

    return authState;
  } catch (error) {
    await releaseLock();
    logger.error(`Failed to init auth state: ${error.message}`);
    throw error;
  }
}

/**
 * Get the session directory path.
 * Returns an absolute path string.
 * Used by other modules.
 */
async function getSessionPath() {
  return SESSION_DIR;
}

/**
 * Clear all stored WhatsApp session files.
 * Creates backup before clearing.
 * Throws on filesystem errors.
 */
async function clearSession() {
  try {
    await backupSession();
    await fs.remove(SESSION_DIR);
    await releaseLock();
    
    if (backupInterval) {
      clearInterval(backupInterval);
      backupInterval = null;
    }
  } catch (error) {
    logger.error(`Failed to clear session: ${error.message}`);
    throw error;
  }
}

/**
 * Cleanup function for graceful shutdown.
 * Releases lock and stops backup interval.
 * Safe to call on exit.
 */
async function cleanup() {
  if (backupInterval) {
    clearInterval(backupInterval);
    backupInterval = null;
  }
  await releaseLock();
}

process.on("exit", () => {
  if (lockAcquired) {
    try {
      fs.removeSync(LOCK_FILE);
    } catch (e) {}
  }
});

module.exports = {
  getSessionPath,
  initAuthState,
  clearSession,
  backupSession,
  restoreFromBackup,
  validateSession,
  clearCorruptedSession,
  cleanup,
};
