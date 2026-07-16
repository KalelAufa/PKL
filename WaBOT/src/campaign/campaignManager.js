const path = require("path");
const { randomUUID } = require("crypto");
const {
  readJson,
  writeJson,
  ensureDir,
  listFiles,
} = require("../utils/fileHelper");
const { logger } = require("../utils/logger");

const LOG_DIR = path.join(process.cwd(), "logs");
const DATA_DIR = path.join(process.cwd(), "data");
const SENT_HISTORY_PATH = path.join(DATA_DIR, "sent-history.json");

let sentHistoryCache = null;

/**
 * Load sent-history once per process and keep a Set for fast lookups.
 * Preserves legacy array format when that is what the file contains.
 */
async function loadSentHistoryCache() {
  if (sentHistoryCache) {
    return sentHistoryCache;
  }

  const history = await readJson(SENT_HISTORY_PATH, { numbers: [] });
  const legacyArray = Array.isArray(history);
  const numbers = legacyArray ? history : history.numbers || [];

  sentHistoryCache = {
    legacyArray,
    numbers,
    set: new Set(numbers),
  };

  return sentHistoryCache;
}

/**
 * Build a campaign log file name with timestamp.
 * Uses ISO format and replaces invalid filename chars.
 * Returns a log file name string.
 */
function buildLogFileName() {
  const stamp = new Date().toISOString().replace(/[:.]/g, "-");
  return `campaign-${stamp}.json`;
}

/**
 * Create a new campaign log file and initial payload.
 * Stores campaign metadata and empty results list.
 * Returns the campaign object with logPath.
 */
async function createCampaign({ product, targetFile, total }) {
  const campaignId = randomUUID();
  const logFile = buildLogFileName();
  const logPath = path.join(LOG_DIR, logFile);

  const campaign = {
    campaignId,
    product,
    targetFile,
    startTime: new Date().toISOString(),
    endTime: null,
    status: "running",
    stats: {
      total,
      sent: 0,
      failed: 0,
      skipped: 0,
      remaining: total,
    },
    results: [],
    logPath,
  };

  try {
    await ensureDir(LOG_DIR);
    await writeJson(logPath, campaign);
  } catch (error) {
    logger.error(`Failed to create campaign: ${error.message}`);
    throw error;
  }

  return campaign;
}

/**
 * Append a result entry to the campaign log.
 * Updates stats and persists the latest state.
 * Returns the updated campaign object.
 */
async function appendResult(campaign, result) {
  campaign.results.push(result);

  if (result.status === "success") {
    campaign.stats.sent += 1;
  } else if (result.status === "failed") {
    campaign.stats.failed += 1;
  } else if (result.status === "skipped") {
    campaign.stats.skipped += 1;
  }

  campaign.stats.remaining = Math.max(
    0,
    campaign.stats.total -
      (campaign.stats.sent + campaign.stats.failed + campaign.stats.skipped),
  );

  await writeJson(campaign.logPath, campaign);
  return campaign;
}

/**
 * Update campaign status and end time.
 * Persists the updated campaign log.
 * Returns the updated campaign object.
 */
async function updateStatus(campaign, status) {
  campaign.status = status;
  if (status !== "running") {
    campaign.endTime = new Date().toISOString();
  }

  await writeJson(campaign.logPath, campaign);
  return campaign;
}

/**
 * Load a campaign log by file path.
 * Returns the parsed campaign object.
 * Returns null if file not found.
 */
async function loadCampaign(filePath) {
  return readJson(filePath, null);
}

/**
 * List campaign log files.
 * Returns objects with file name and full path.
 * Sorted by most recent first.
 */
async function listCampaignLogs() {
  await ensureDir(LOG_DIR);
  const files = await listFiles(LOG_DIR, [".json"]);
  const logs = files
    .filter((file) => file.startsWith("campaign-"))
    .sort()
    .reverse()
    .map((file) => ({
      file,
      path: path.join(LOG_DIR, file),
    }));

  return logs;
}

/**
 * Update sent-history store with a new number.
 * Supports legacy array or { numbers: [] } format.
 * Persists the updated history to disk.
 */
async function updateSentHistory(number) {
  const history = await loadSentHistoryCache();

  if (!history.set.has(number)) {
    history.numbers.push(number);
    history.set.add(number);
  }

  const payload = history.legacyArray ? history.numbers : { numbers: history.numbers };
  await writeJson(SENT_HISTORY_PATH, payload);
  // Invalidate cache so next loadSentHistoryCache reads updated data
  sentHistoryCache = null;
}

module.exports = {
  createCampaign,
  appendResult,
  updateStatus,
  loadCampaign,
  listCampaignLogs,
  updateSentHistory,
};
