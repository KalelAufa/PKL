const inquirer = require("inquirer");

/**
 * Prompt user to select a category.
 * Returns the chosen category name.
 * Throws when no category is available.
 */
async function selectCategory(categories) {
  if (!categories.length) {
    throw new Error("No categories available.");
  }

  const { category } = await inquirer.prompt([
    {
      type: "list",
      name: "category",
      message: "Pilih kategori:",
      pageSize: 10,
      choices: categories,
    },
  ]);

  return category;
}

/**
 * Prompt user to select a subcategory.
 * Returns the chosen subcategory name.
 * Throws when no subcategory is available.
 */
async function selectSubcategory(subcategories) {
  if (!subcategories.length) {
    throw new Error("No subcategories available.");
  }

  const { subcategory } = await inquirer.prompt([
    {
      type: "list",
      name: "subcategory",
      message: "Pilih subkategori:",
      pageSize: 10,
      choices: subcategories,
    },
  ]);

  return subcategory;
}

/**
 * Prompt user to select a product with asset counts.
 * Returns the chosen product name.
 * Accepts an array of choice objects.
 */
async function selectProduct(productChoices) {
  if (!productChoices.length) {
    throw new Error("No products available.");
  }

  const { product } = await inquirer.prompt([
    {
      type: "list",
      name: "product",
      message: "Pilih produk:",
      pageSize: 10,
      choices: productChoices,
    },
  ]);

  return product;
}

/**
 * Prompt user to select target file.
 * Returns the chosen file name.
 * Throws when no target file is available.
 */
async function selectTargetFile(files) {
  if (!files.length) {
    throw new Error("No target files found in /targets.");
  }

  const { file } = await inquirer.prompt([
    {
      type: "list",
      name: "file",
      message: "Pilih file target:",
      pageSize: 10,
      choices: files,
    },
  ]);

  return file;
}

module.exports = {
  selectCategory,
  selectSubcategory,
  selectProduct,
  selectTargetFile,
};
