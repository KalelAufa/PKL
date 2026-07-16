const path = require("path");
const dotenv = require("dotenv");

dotenv.config({ path: path.join(process.cwd(), ".env") });

const { installConsoleFilters } = require("./src/utils/consoleFilter");
const { ensureDir, fileExists, writeJson } = require("./src/utils/fileHelper");
const { logger } = require("./src/utils/logger");

installConsoleFilters();

const { startMenu } = require("./src/cli/menu");

const ROOT_DIR = process.cwd();
const DATA_DIR = path.join(ROOT_DIR, "data");

/**
 * Ensure required data files exist with default content.
 * This keeps the app idempotent across multiple runs.
 * Returns when both files are ready.
 */
async function ensureDataFiles() {
  const blacklistPath = path.join(DATA_DIR, "blacklist.json");
  const sentHistoryPath = path.join(DATA_DIR, "sent-history.json");

  try {
    if (!(await fileExists(blacklistPath))) {
      await writeJson(blacklistPath, []);
    }

    if (!(await fileExists(sentHistoryPath))) {
      await writeJson(sentHistoryPath, { numbers: [] });
    }
  } catch (error) {
    logger.error(`Failed to prepare data files: ${error.message}`);
    throw error;
  }
}

/**
 * Bootstrap the CLI application and required directories.
 * Creates base folders so subsequent modules can rely on them.
 * Exits with code 1 on fatal startup errors.
 */
async function bootstrap() {
  try {
    await ensureDir(path.join(ROOT_DIR, "logs"));
    await ensureDir(path.join(ROOT_DIR, "sessions"));
    await ensureDir(path.join(ROOT_DIR, "targets"));
    await ensureDir(path.join(ROOT_DIR, "campaigns"));
    await ensureDataFiles();

    await startMenu();
  } catch (error) {
    logger.error(`Fatal error: ${error.message}`);
    process.exit(1);
  }
}

bootstrap();
