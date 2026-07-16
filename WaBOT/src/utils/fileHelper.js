const fs = require("fs-extra");
const path = require("path");

/**
 * Ensure a directory exists and return its path.
 * Creates parent folders recursively if they do not exist.
 * Throws on filesystem errors.
 */
async function ensureDir(dirPath) {
  try {
    await fs.ensureDir(dirPath);
    return dirPath;
  } catch (error) {
    throw new Error(`Failed to ensure dir ${dirPath}: ${error.message}`);
  }
}

/**
 * Check whether a path exists.
 * Returns true when a file or directory is present.
 * Throws on unexpected IO errors.
 */
async function fileExists(filePath) {
  try {
    return await fs.pathExists(filePath);
  } catch (error) {
    throw new Error(`Failed to check path ${filePath}: ${error.message}`);
  }
}

/**
 * Read a JSON file and return its parsed content.
 * When the file is missing, returns the provided default value.
 * Throws on invalid JSON or IO errors.
 */
async function readJson(filePath, defaultValue = null) {
  try {
    if (!(await fs.pathExists(filePath))) {
      return defaultValue;
    }

    return await fs.readJson(filePath);
  } catch (error) {
    throw new Error(`Failed to read JSON ${filePath}: ${error.message}`);
  }
}

/**
 * Write JSON data to a file with pretty formatting.
 * Creates parent directories if needed.
 * Throws on IO errors.
 */
async function writeJson(filePath, data) {
  try {
    await fs.outputJson(filePath, data, { spaces: 2 });
  } catch (error) {
    throw new Error(`Failed to write JSON ${filePath}: ${error.message}`);
  }
}

/**
 * Read a text file and return the raw string content.
 * Throws on file-not-found or IO errors.
 * Always returns a string when successful.
 */
async function readText(filePath) {
  try {
    return await fs.readFile(filePath, "utf8");
  } catch (error) {
    throw new Error(`Failed to read text ${filePath}: ${error.message}`);
  }
}

/**
 * List all direct subdirectories for a given folder.
 * Returns only folder names, not full paths.
 * Throws on IO errors.
 */
async function listDirs(dirPath) {
  try {
    const entries = await fs.readdir(dirPath, { withFileTypes: true });
    return entries
      .filter((entry) => entry.isDirectory())
      .map((entry) => entry.name)
      .sort((a, b) => a.localeCompare(b));
  } catch (error) {
    throw new Error(`Failed to list dirs ${dirPath}: ${error.message}`);
  }
}

/**
 * List all files in a folder, optionally filtered by extension.
 * Returns file names without the directory path.
 * Throws on IO errors.
 */
async function listFiles(dirPath, extensions = []) {
  try {
    const entries = await fs.readdir(dirPath, { withFileTypes: true });
    const files = entries
      .filter((entry) => entry.isFile())
      .map((entry) => entry.name)
      .sort((a, b) => a.localeCompare(b));

    if (!extensions.length) {
      return files;
    }

    const normalized = extensions.map((ext) => ext.toLowerCase());
    return files.filter((file) =>
      normalized.includes(path.extname(file).toLowerCase()),
    );
  } catch (error) {
    throw new Error(`Failed to list files ${dirPath}: ${error.message}`);
  }
}

module.exports = {
  ensureDir,
  fileExists,
  readJson,
  writeJson,
  readText,
  listDirs,
  listFiles,
};
