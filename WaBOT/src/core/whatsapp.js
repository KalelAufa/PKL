const {
  default: makeWASocket,
  DisconnectReason,
  fetchLatestBaileysVersion,
} = require("@whiskeysockets/baileys");
const qrcode = require("qrcode-terminal");
const chalk = require("chalk");
const {
  initAuthState,
  clearCorruptedSession,
  restoreFromBackup,
  cleanup: cleanupSession,
} = require("./sessionManager");
const { ReconnectManager, ConnectionHealthMonitor } = require("./reconnectManager");
const { logger, createBaileysLogger } = require("../utils/logger");
const {
  storeMessage,
  getMessage,
  storeGroupMetadata,
  getCachedGroupMetadata,
} = require("./messageStore");

let socket = null;
let connectionState = "disconnected";
let isConnecting = false;
let connectPromise = null;
let reconnectManager = new ReconnectManager({
  maxRetries: 10,
  baseDelay: 2000,
  maxDelay: 60000,
});
let healthMonitor = new ConnectionHealthMonitor({
  pingInterval: 30000,
  maxFailedPings: 3,
});
let connectionAttempts = 0;
const MAX_BAD_MAC_RETRIES = 2;
let badMacCount = 0;
let signalHandlersRegistered = false;

/**
 * Resolve the browser/session label shown by WhatsApp linked devices.
 * Reads SESSION_NAME from .env when available.
 * Falls back to the project default name.
 */
function getBrowserName() {
  return process.env.SESSION_NAME || "WA Broadcast Bot";
}

async function handleConnectionUpdate(update) {
  const { connection, lastDisconnect, qr } = update;

  if (qr) {
    logger.info("QR code generated");
    console.log(chalk.yellow("\nScan QR code with WhatsApp:\n"));
    qrcode.generate(qr, { small: true });
    console.log("");
  }

  if (connection === "open") {
    connectionState = "open";
    connectionAttempts = 0;
    badMacCount = 0;
    reconnectManager.reset();
    healthMonitor.reset();
    logger.info("WhatsApp connection opened");

    healthMonitor.start(
      async () => {
        if (socket) {
          await socket.sendPresenceUpdate("available");
        }
      },
      async () => {
        await handleReconnect();
      }
    );

    return;
  }

  if (connection === "close") {
    healthMonitor.stop();

    const statusCode = lastDisconnect?.error?.output?.statusCode;
    const errorMessage = lastDisconnect?.error?.message || "";
    const isBadMac = errorMessage.includes("Bad MAC") || errorMessage.includes("decrypt");
    const isLoggedOut = statusCode === DisconnectReason.loggedOut;

    connectionState = "disconnected";

    if (errorMessage && !isBadMac) {
      logger.error(`Connection error: ${errorMessage}`);
    }

    if (isBadMac) {
      badMacCount += 1;
      logger.warn(`Bad MAC/decrypt error detected (${badMacCount}/${MAX_BAD_MAC_RETRIES})`);

      if (badMacCount >= MAX_BAD_MAC_RETRIES) {
        console.log(chalk.red("Session corrupt, attempting recovery..."));

        const restored = await restoreFromBackup();
        if (restored) {
          console.log(chalk.dim("Session restored from backup"));
          badMacCount = 0;
          socket = null;
          await connect();
          return;
        }

        console.log(chalk.dim("Clearing corrupted session"));
        await clearCorruptedSession();
        badMacCount = 0;
        socket = null;
        connectionState = "needs_qr";
        console.log(chalk.yellow("Restart and scan QR code"));
        return;
      }

      socket = null;
      await reconnectManager.attemptReconnect(async () => {
        await connect();
      });
      return;
    }

    if (isLoggedOut) {
      socket = null;
      connectionState = "needs_qr";
      logger.warn("Logged out from WhatsApp");
      console.log(chalk.yellow("Logged out. Scan QR code again."));
      await clearCorruptedSession();
      await cleanupSession();
      setTimeout(() => {
        connect().catch((error) => {
          logger.error(`Failed to restart after logout: ${error.message}`);
        });
      }, 1000);
      return;
    }

    connectionAttempts += 1;

    socket = null;
    await reconnectManager.attemptReconnect(async () => {
      await connect();
    });
  }
}

async function handleReconnect() {
  try {
    if (socket) {
      socket.end();
      socket = null;
    }

    connectionState = "reconnecting";
    await connect();
  } catch (error) {
    logger.error(`Reconnect failed: ${error.message}`);
  }
}

function setupSignalHandlers() {
  if (signalHandlersRegistered) {
    return;
  }

  const handler = async () => {
    await disconnect();
    process.exit(0);
  };

  process.once("SIGINT", handler);
  process.once("SIGTERM", handler);
  signalHandlersRegistered = true;
}

async function connect() {
  if (socket) return socket;
  if (connectPromise) return connectPromise;

  isConnecting = true;
  setupSignalHandlers();

  connectPromise = (async () => {
    const { state, saveCreds } = await initAuthState();
    const { version } = await fetchLatestBaileysVersion();

    socket = makeWASocket({
      version,
      auth: state,
      logger: createBaileysLogger(),
      browser: [getBrowserName(), "Chrome", "1.0.0"],
      markOnlineOnConnect: false,
      printQRInTerminal: false,
      getMessage: getMessage,
      cachedGroupMetadata: getCachedGroupMetadata,
    });

    socket.ev.on("creds.update", saveCreds);
    socket.ev.on("connection.update", handleConnectionUpdate);
    socket.ev.on("messages.upsert", async ({ messages }) => {
      // Store messages for getMessage (retry & poll votes)
      for (const msg of messages) {
        storeMessage(msg);
      }
    });

    // Cache group metadata when updated
    socket.ev.on("groups.update", async (updates) => {
      for (const update of updates) {
        try {
          const metadata = await socket.groupMetadata(update.id);
          storeGroupMetadata(update.id, metadata);
        } catch (error) {
          logger.error(`Failed to cache group metadata: ${error.message}`);
        }
      }
    });

    // Cache group metadata when participants change
    socket.ev.on("group-participants.update", async (event) => {
      try {
        const metadata = await socket.groupMetadata(event.id);
        storeGroupMetadata(event.id, metadata);
      } catch (error) {
        logger.error(`Failed to cache group metadata: ${error.message}`);
      }
    });

    return socket;
  })();

  try {
    return await connectPromise;
  } catch (error) {
    logger.error(`Failed to connect: ${error.message}`);
    throw error;
  } finally {
    isConnecting = false;
    connectPromise = null;
  }
}

function getSocket() {
  return socket;
}

function isConnected() {
  return connectionState === "open";
}

async function disconnect() {
  try {
    healthMonitor.stop();

    if (socket) {
      socket.end();
    }

    await cleanupSession();
  } catch (error) {
    logger.error(`Disconnect failed: ${error.message}`);
  } finally {
    socket = null;
    connectionState = "disconnected";
  }
}

function getConnectionStatus() {
  return {
    state: connectionState,
    isConnected: connectionState === "open",
    reconnect: reconnectManager.getStatus(),
    health: healthMonitor.getStatus(),
    badMacCount,
    connectionAttempts,
  };
}

module.exports = {
  connect,
  getSocket,
  isConnected,
  disconnect,
  getConnectionStatus,
};
