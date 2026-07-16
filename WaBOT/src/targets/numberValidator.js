const { parsePhoneNumberFromString } = require("libphonenumber-js");

// All Indonesian mobile operators (0811-0819)
const VALID_PREFIXES = [
  "6281", // Telkomsel, XL, Indosat, Tri
  "6282", // Telkomsel
  "6283", // Telkomsel, XL, Axis
  "6284", // Smartfren (4G LTE)
  "6285", // Indosat, Tri, Smartfren
  "6286", // XL
  "6287", // XL
  "6288", // Smartfren, Telkomsel (Halo), XL
  "6289", // Tri, Smartfren, XL
];

// Minimum and maximum length after normalization
const MIN_LENGTH = 11; // 62811234567 (shortest valid)
const MAX_LENGTH = 15; // max international number length

/**
 * Normalize raw input into Indonesian E.164 digits.
 * Accepts 08xx, 8xx, 62xx, +62xx formats.
 * Returns normalized digits without plus sign or null.
 */
function normalizeIndonesianNumber(raw) {
  if (!raw) return null;

  const rawText = String(raw).trim();
  if (!rawText) return null;

  const parsed = parsePhoneNumberFromString(rawText, "ID");
  if (parsed?.isValid()) return parsed.number.replace("+", "");

  let digits = rawText.replace(/\D/g, "");

  if (digits.startsWith("0")) digits = `62${digits.slice(1)}`;
  else if (digits.startsWith("8")) digits = `62${digits}`;
  else if (digits.startsWith("0062")) digits = digits.slice(2);

  return digits.startsWith("62") ? digits : null;
}

/**
 * Validate and normalize Indonesian phone number for Baileys.
 * Returns an object with number and jid when valid.
 * Returns null if the number is invalid.
 * 
 * Valid formats: 08xx, 628xx, +628xx, 8xx
 * Length: 11-15 digits after normalization
 * Prefix: 6281-6289 (all Indonesian mobile operators)
 */
function validateIndonesianNumber(raw) {
  const normalized = normalizeIndonesianNumber(raw);
  if (!normalized || normalized.length < MIN_LENGTH || normalized.length > MAX_LENGTH) {
    return null;
  }

  // Check if starts with valid Indonesian mobile prefix
  if (!VALID_PREFIXES.some((prefix) => normalized.startsWith(prefix))) {
    return null;
  }

  return {
    number: normalized,
    jid: `${normalized}@s.whatsapp.net`,
  };
}

module.exports = {
  normalizeIndonesianNumber,
  validateIndonesianNumber,
};
