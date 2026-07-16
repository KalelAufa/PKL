const path = require("path");
const ExcelJS = require("exceljs");
const { readJson, listFiles } = require("../utils/fileHelper");
const {
  normalizeIndonesianNumber,
  validateIndonesianNumber,
} = require("./numberValidator");
const { deduplicateTargets } = require("./deduplicator");
const { logger } = require("../utils/logger");

const TARGETS_DIR = path.join(process.cwd(), "targets");
const DATA_DIR = path.join(process.cwd(), "data");
const BLACKLIST_PATH = path.join(DATA_DIR, "blacklist.json");
const SENT_HISTORY_PATH = path.join(DATA_DIR, "sent-history.json");

const NAME_HEADERS = ["nama", "name", "full_name", "fullname"];
const NUMBER_HEADERS = [
  "nomor",
  "no",
  "no_hp",
  "phone",
  "hp",
  "whatsapp",
  "wa",
];

/**
 * Normalize header strings for flexible detection.
 * Lowercases and removes non-alphanumeric characters.
 * Returns a normalized header key.
 */
function normalizeHeader(value) {
  return String(value || "")
    .toLowerCase()
    .replace(/[^a-z0-9]/g, "");
}

/**
 * Detect column index by matching against header candidates.
 * Returns index or -1 when not found.
 * Accepts header row as an array of values.
 */
function detectColumnIndex(headers, candidates) {
  const normalizedCandidates = candidates.map((name) => normalizeHeader(name));

  for (let i = 0; i < headers.length; i += 1) {
    const headerValue = normalizeHeader(headers[i]);
    if (normalizedCandidates.includes(headerValue)) {
      return i;
    }
  }

  return -1;
}

/**
 * Get list of available target files.
 * Includes .xlsx and .csv files only.
 * Returns an array of file names.
 */
async function getTargetFiles() {
  const files = await listFiles(TARGETS_DIR, [".xlsx", ".csv"]);
  return files.sort();
}

/**
 * Read rows from the first worksheet in an Excel/CSV file.
 * Uses ExcelJS to support both xlsx and csv formats.
 * Returns a 2D array of row values.
 */
async function readWorksheetRows(fullPath) {
  const workbook = new ExcelJS.Workbook();
  const extension = path.extname(fullPath).toLowerCase();

  if (extension === ".csv") {
    await workbook.csv.readFile(fullPath);
  } else {
    await workbook.xlsx.readFile(fullPath);
  }

  const sheet = workbook.worksheets[0];
  if (!sheet) {
    return [];
  }

  const rows = [];
  sheet.eachRow({ includeEmpty: false }, (row) => {
    rows.push(row.values.slice(1));
  });

  return rows;
}

/**
 * Parse targets from an Excel or CSV file.
 * Performs validation, normalization, blacklist, and dedupe.
 * Returns targets and stats summary.
 */
async function parseTargets(filePath, options = {}) {
  const fullPath = path.isAbsolute(filePath)
    ? filePath
    : path.join(TARGETS_DIR, filePath);

  try {
    const rows = await readWorksheetRows(fullPath);

    if (!rows.length) {
      return { targets: [], stats: { total: 0, valid: 0, invalid: 0 } };
    }

    const headers = rows[0];
    const nameIndex = detectColumnIndex(headers, NAME_HEADERS);
    const numberIndex = detectColumnIndex(headers, NUMBER_HEADERS);

    const blacklistNumbers =
      String(process.env.ENABLE_BLACKLIST || "true") === "true"
        ? await readJson(BLACKLIST_PATH, [])
        : [];
    const blacklist = new Set(
      blacklistNumbers
        .map((number) => normalizeIndonesianNumber(number))
        .filter(Boolean),
    );

    let sentHistory = new Set();
    if (options.resume === true) {
      const history = await readJson(SENT_HISTORY_PATH, { numbers: [] });
      const nums = Array.isArray(history) ? history : history.numbers || [];
      sentHistory = new Set(nums);
    }

    const targets = [];
    let invalid = 0;

    for (let i = 1; i < rows.length; i += 1) {
      const row = rows[i];
      const name = nameIndex >= 0 ? row[nameIndex] : row[0];
      const numberRaw = numberIndex >= 0 ? row[numberIndex] : row[1];

      const validated = validateIndonesianNumber(numberRaw);
      if (!validated) {
        invalid += 1;
        continue;
      }

      if (blacklist.has(validated.number)) {
        continue;
      }

      if (options.resume === true && sentHistory.has(validated.number)) {
        continue;
      }

      targets.push({
        name: String(name || "").trim() || "-",
        number: validated.number,
        jid: validated.jid,
      });
    }

    const deduped = deduplicateTargets(targets);

    return {
      targets: deduped,
      stats: {
        total: rows.length - 1,
        valid: deduped.length,
        invalid,
      },
    };
  } catch (error) {
    logger.error(`Failed to parse targets: ${error.message}`);
    throw error;
  }
}

module.exports = {
  getTargetFiles,
  parseTargets,
};
