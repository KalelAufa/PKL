const path = require("path");
const fs = require("fs-extra");
const { readJson, listFiles } = require("../utils/fileHelper");
const { logger } = require("../utils/logger");

/**
 * Normalize broadcast configuration for a product.
 * Applies default delay values from environment variables.
 * Returns a merged broadcast config object.
 */
function normalizeBroadcastConfig(product) {
  const defaultMin = Number(process.env.DEFAULT_DELAY_MIN || 8);
  const defaultMax = Number(process.env.DEFAULT_DELAY_MAX || 20);

  const broadcast = product.broadcast || {};
  const delay = broadcast.delay || {};

  return {
    sendImage: broadcast.sendImage !== false,
    imageMode: broadcast.imageMode || "random",
    templateMode: broadcast.templateMode || "random",
    delay: {
      min: Number(delay.min || defaultMin),
      max: Number(delay.max || defaultMax),
    },
  };
}

/**
 * Load product configuration and assets from a product directory.
 * Reads product.json and lists templates and image files.
 * Returns a normalized product object with paths.
 */
async function loadProduct(productDir) {
  const productPath = path.join(productDir, "product.json");
  const templatesDir = path.join(productDir, "templates");
  const imagesDir = path.join(productDir, "images");

  try {
    if (!(await fs.pathExists(productPath))) {
      throw new Error("product.json not found");
    }

    const product = await readJson(productPath, null);
    if (!product) {
      throw new Error("product.json is empty or invalid");
    }

    const templateFiles = await listFiles(templatesDir, [".txt"]);
    const imageFiles = await listFiles(imagesDir, [".jpg", ".jpeg", ".png"]);

    const normalized = {
      ...product,
      active: product.active !== false,
      broadcast: normalizeBroadcastConfig(product),
      templates: templateFiles.map((file) => path.join(templatesDir, file)),
      images: imageFiles.map((file) => path.join(imagesDir, file)),
      paths: {
        productDir,
        productPath,
        templatesDir,
        imagesDir,
      },
    };

    return normalized;
  } catch (error) {
    logger.warn(`Failed to load product ${productDir}: ${error.message}`);
    return null;
  }
}

module.exports = { loadProduct };
