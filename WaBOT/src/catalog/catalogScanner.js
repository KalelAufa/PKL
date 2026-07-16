const path = require("path");
const fs = require("fs-extra");
const { listDirs } = require("../utils/fileHelper");
const { logger } = require("../utils/logger");
const { loadProduct } = require("./productLoader");

const CATALOG_DIR = path.join(process.cwd(), "campaigns");

const cache = {
  signature: null,
  tree: null,
  index: new Map(),
};

/**
 * Recursively calculate the latest modified time for a directory.
 * Used to invalidate cache when catalog structure changes.
 * Returns a numeric timestamp in milliseconds.
 */
async function getDirectorySignature(dirPath) {
  let latest = 0;

  try {
    const { mtimeMs: selfMtime } = await fs.stat(dirPath);
    latest = selfMtime;

    const entries = await fs.readdir(dirPath, { withFileTypes: true });
    if (entries.length) {
      const entrySignatures = await Promise.all(entries.map(async (entry) => {
        const fullPath = path.join(dirPath, entry.name);
        const { mtimeMs } = await fs.stat(fullPath);

        if (entry.isDirectory()) {
          return Math.max(mtimeMs, await getDirectorySignature(fullPath));
        }

        return mtimeMs;
      }));

      latest = Math.max(latest, ...entrySignatures);
    }
  } catch (error) {
    logger.warn(`Failed to scan directory ${dirPath}: ${error.message}`);
  }

  return latest;
}

/**
 * Build a unique index key for a product entry.
 * Used to map category/subcategory/product to metadata.
 * Returns a string key.
 */
function makeKey(category, subcategory, productName) {
  return `${category}::${subcategory}::${productName}`;
}

/**
 * Scan the campaigns directory and build catalog tree.
 * Filters inactive products and validates templates/images.
 * Returns a tree with category -> subcategory -> product list.
 */
async function scanCatalog() {
  const signature = await getDirectorySignature(CATALOG_DIR);
  if (cache.signature === signature && cache.tree) {
    return cache.tree;
  }

  const tree = {};
  const index = new Map();

  const categories = await listDirs(CATALOG_DIR);
  for (const category of categories) {
    const categoryPath = path.join(CATALOG_DIR, category);
    const subcategories = await listDirs(categoryPath);

    for (const subcategory of subcategories) {
      const subcategoryPath = path.join(categoryPath, subcategory);
      const productDirs = await listDirs(subcategoryPath);

      for (const productFolder of productDirs) {
        const productPath = path.join(subcategoryPath, productFolder);
        const product = await loadProduct(productPath);

        if (!product || !product.active) {
          continue;
        }

        if (!product.templates.length || !product.images.length) {
          logger.warn(`Skipped product without assets: ${productFolder}`);
          continue;
        }

        if (!tree[category]) {
          tree[category] = {};
        }

        if (!tree[category][subcategory]) {
          tree[category][subcategory] = [];
        }

        tree[category][subcategory].push(product.name);

        index.set(makeKey(category, subcategory, product.name), {
          productPath,
          templateCount: product.templates.length,
          imageCount: product.images.length,
        });
      }
    }
  }

  cache.signature = signature;
  cache.tree = tree;
  cache.index = index;

  return tree;
}

/**
 * Get list of top-level categories.
 * Scans the catalog if cache is invalid.
 * Returns an array of category names.
 */
async function getCategories() {
  const tree = await scanCatalog();
  return Object.keys(tree);
}

/**
 * Get products for a given category/subcategory.
 * Returns an array of product names.
 * Returns empty array when category is missing.
 */
async function getProducts(category, subcategory) {
  const tree = await scanCatalog();
  return tree?.[category]?.[subcategory] || [];
}

/**
 * Get product metadata for a specific selection.
 * Uses cached index with paths and counts.
 * Returns null if the product is missing.
 */
async function getProductMeta(category, subcategory, productName) {
  await scanCatalog();
  return cache.index.get(makeKey(category, subcategory, productName)) || null;
}

module.exports = {
  scanCatalog,
  getCategories,
  getProducts,
  getProductMeta,
};
