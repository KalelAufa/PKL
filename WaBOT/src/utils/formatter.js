/**
 * Generate a random integer between min and max.
 * Automatically swaps values when min is greater than max.
 * Returns a whole number.
 */
function randomBetween(min, max) {
  const first = Number(min);
  const second = Number(max);
  const safeMin = Number.isFinite(first) ? first : 0;
  const safeMax = Number.isFinite(second) ? second : safeMin;
  const low = Math.min(safeMin, safeMax);
  const high = Math.max(safeMin, safeMax);
  return Math.floor(Math.random() * (high - low + 1)) + low;
}

/**
 * Apply jitter of +/- 20 percent to a numeric value.
 * Returns the adjusted number.
 * Used for randomizing timing.
 */
function jitter(value) {
  const base = Number(value);
  if (!Number.isFinite(base) || base <= 0) {
    return 0;
  }

  return base * (0.8 + Math.random() * 0.4);
}

/**
 * Sleep for the given number of milliseconds.
 * Returns a promise that resolves after the delay.
 * Safe to await in async flows.
 */
async function sleep(ms) {
  const delay = Math.max(0, Number(ms) || 0);
  return new Promise((resolve) => setTimeout(resolve, delay));
}

/**
 * Pick a random item from an array.
 * Returns null when the array is empty.
 * Does not mutate the original array.
 */
function pickRandom(items) {
  if (!items || items.length === 0) {
    return null;
  }

  const index = Math.floor(Math.random() * items.length);
  return items[index];
}

/**
 * Format a number with Indonesian thousands separators.
 * Returns a string without a currency symbol.
 * Non-numeric values become 0.
 */
function formatNumberIDR(value) {
  const numeric = Number(value) || 0;
  return new Intl.NumberFormat("id-ID", { maximumFractionDigits: 0 }).format(
    numeric,
  );
}

/**
 * Format a date into an Indonesian locale string.
 * Accepts a Date instance or uses the current date.
 * Returns a short date string.
 */
function formatDate(date = new Date()) {
  return date.toLocaleDateString("id-ID");
}

/**
 * Format a time into an Indonesian locale string.
 * Accepts a Date instance or uses the current time.
 * Returns HH:mm format.
 */
function formatTime(date = new Date()) {
  return date.toLocaleTimeString("id-ID", {
    hour: "2-digit",
    minute: "2-digit",
  });
}

/**
 * Add optional random padding to a message for length variation.
 * Uses spaces or new lines to keep the content readable.
 * Returns the padded message.
 */
function padMessage(text) {
  if (Math.random() >= 0.3) return text;
  
  const padChar = Math.random() < 0.5 ? " " : "\n";
  return text + padChar.repeat(randomBetween(1, 3));
}

/**
 * Format a duration in milliseconds to HH:MM:SS.
 * Returns a zero-padded string.
 * Useful for progress UI.
 */
function formatDuration(ms) {
  const totalSeconds = Math.floor(ms / 1000);
  const hours = Math.floor(totalSeconds / 3600);
  const minutes = Math.floor((totalSeconds % 3600) / 60);
  const seconds = totalSeconds % 60;

  return `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
}

module.exports = {
  randomBetween,
  jitter,
  sleep,
  pickRandom,
  formatNumberIDR,
  formatDate,
  formatTime,
  padMessage,
  formatDuration,
};
