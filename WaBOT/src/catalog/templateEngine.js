const { readText } = require("../utils/fileHelper");
const {
  formatNumberIDR,
  formatDate,
  formatTime,
} = require("../utils/formatter");

/**
 * Load a template file into a string.
 * Returns the raw template text.
 * Throws when the template file is missing.
 */
async function loadTemplate(filePath) {
  return readText(filePath);
}

/**
 * Render a template string with variable interpolation.
 * Replaces {{variable}} placeholders with provided values.
 * Returns the final rendered string.
 */
function renderTemplate(templateText, variables) {
  return templateText.replace(/{{\s*([\w.-]+)\s*}}/g, (_, key) => {
    const value = variables[key];
    return value !== undefined && value !== null ? String(value) : "";
  });
}

/**
 * Build the variable map from target and product data.
 * Includes system-generated variables like date and time.
 * Returns a flat key-value object.
 */
function buildVariableMap({ target, product }) {
  const priceOriginal = formatNumberIDR(product?.price?.original || 0);
  const priceDiscount = formatNumberIDR(product?.price?.discounted || 0);

  return {
    nama: target?.name || "-",
    produk: product?.name || "-",
    harga_asli: priceOriginal,
    harga_diskon: priceDiscount,
    deskripsi: product?.description || "-",
    cta_text: product?.cta?.text || "Hubungi",
    cta_link: product?.cta?.link || "-",
    stok: product?.variables?.stok || "-",
    garansi: product?.variables?.garansi || "-",
    lokasi: product?.variables?.lokasi || "-",
    tanggal: formatDate(),
    waktu: formatTime(),
  };
}

module.exports = {
  loadTemplate,
  renderTemplate,
  buildVariableMap,
};
