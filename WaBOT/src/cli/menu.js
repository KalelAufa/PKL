const inquirer = require("inquirer");
const chalk = require("chalk");
const path = require("path");
const fs = require("fs-extra");
const { connect, isConnected, getSocket, disconnect } = require("../core/whatsapp");
const { clearSession } = require("../core/sessionManager");
const { scanCatalog, getProductMeta } = require("../catalog/catalogScanner");
const { loadProduct } = require("../catalog/productLoader");
const { getTargetFiles, parseTargets } = require("../targets/excelParser");
const { validateIndonesianNumber } = require("../targets/numberValidator");
const {
  createCampaign,
  listCampaignLogs,
  loadCampaign,
  updateStatus,
} = require("../campaign/campaignManager");
const { getRemainingTargets } = require("../campaign/resumeHandler");
const { startBroadcast } = require("../core/broadcaster");
const { randomBetween, sleep } = require("../utils/formatter");
const { logger } = require("../utils/logger");
const { readJson, writeJson } = require("../utils/fileHelper");
const display = require("./display");
const selector = require("./selector");

const DATA_DIR = path.join(process.cwd(), "data");
const BLACKLIST_PATH = path.join(DATA_DIR, "blacklist.json");

async function ensureConnected() {
  console.log(chalk.dim("Connecting to WhatsApp..."));
  await connect();

  for (let i = 0; i < 60; i++) {
    if (isConnected()) {
      console.log(chalk.green("Connected"));
      return true;
    }
    await sleep(1000);
  }

  throw new Error("Failed to connect to WhatsApp.");
}

function estimateDuration(product, totalTargets) {
  const delay = product?.broadcast?.delay || {};
  const delayMin = Number(delay.min) || Number(process.env.DEFAULT_DELAY_MIN) || 8;
  const delayMax = Number(delay.max) || Number(process.env.DEFAULT_DELAY_MAX) || 20;
  const avgDelay = (delayMin + delayMax) / 2;
  
  const cooldownEvery = Number(process.env.COOLDOWN_EVERY || 30);
  const cooldownMin = Number(process.env.COOLDOWN_DURATION_MIN || 60);
  const cooldownMax = Number(process.env.COOLDOWN_DURATION_MAX || 120);
  const cooldownAvg = (cooldownMin + cooldownMax) / 2;

  const cooldownCount =
    cooldownEvery > 0 ? Math.floor(totalTargets / cooldownEvery) : 0;
  return Math.round(totalTargets * avgDelay + cooldownCount * cooldownAvg);
}

async function runNewCampaign() {
  const catalog = await scanCatalog();
  const categories = Object.keys(catalog);

  if (!categories.length) {
    console.log(chalk.red("Tidak ada katalog produk."));
    console.log(chalk.dim("Tambahkan produk di folder campaigns/"));
    return;
  }

  const category = await selector.selectCategory(categories);
  const subcategories = Object.keys(catalog[category] || {});

  if (!subcategories.length) {
    console.log(chalk.red("Tidak ada subkategori."));
    return;
  }

  const subcategory = await selector.selectSubcategory(subcategories);

  const productNames = catalog[category]?.[subcategory] || [];

  if (!productNames.length) {
    console.log(chalk.red("Tidak ada produk."));
    return;
  }

  const productChoices = [];

  for (const productName of productNames) {
    const meta = await getProductMeta(category, subcategory, productName);
    const label = `${productName} [${meta?.templateCount || 0} template, ${meta?.imageCount || 0} gambar]`;
    productChoices.push({ name: label, value: productName });
  }

  const productName = await selector.selectProduct(productChoices);
  const meta = await getProductMeta(category, subcategory, productName);
  if (!meta) {
    throw new Error("Produk tidak ditemukan.");
  }

  const product = await loadProduct(meta.productPath);
  if (!product) {
    throw new Error("Gagal memuat product.json.");
  }

  console.log("");
  console.log(chalk.bold("Produk"));
  console.log(`  Nama       : ${chalk.white(product.name)}`);
  console.log(`  Kategori   : ${chalk.white(product.category)} > ${chalk.white(product.subcategory)}`);
  console.log(`  Harga      : ${chalk.white("Rp " + (product.price?.original || 0).toLocaleString("id-ID"))} ${product.price?.discounted ? chalk.green("→ Rp " + product.price.discounted.toLocaleString("id-ID")) : ""}`);
  console.log(`  Template   : ${chalk.white(product.templates.length)} file`);
  console.log(`  Gambar     : ${chalk.white(product.images.length)} file`);

  const targetFiles = await getTargetFiles();

  if (!targetFiles.length) {
    console.log(chalk.red("Tidak ada file target."));
    console.log(chalk.dim("Tambahkan .xlsx atau .csv di folder targets/"));
    return;
  }

  const targetFile = await selector.selectTargetFile(targetFiles);
  const { targets, stats } = await parseTargets(targetFile, { resume: false });

  if (!targets.length) {
    console.log(chalk.red("Tidak ada target valid."));
    console.log(chalk.dim(`Total: ${stats.total}, Valid: ${stats.valid}, Invalid: ${stats.invalid}`));
    return;
  }

  const estimateSeconds = estimateDuration(product, targets.length);

  console.log("");
  console.log(chalk.bold("Target"));
  console.log(`  Total  : ${chalk.white(stats.total)}`);
  console.log(`  Valid  : ${chalk.green(stats.valid)}`);
  console.log(`  Invalid: ${chalk.red(stats.invalid)}`);

  display.showCampaignSummary({
    product,
    targetCount: targets.length,
    estimateSeconds,
  });

  const { confirm } = await inquirer.prompt([
    {
      type: "confirm",
      name: "confirm",
      message: "Mulai campaign?",
    },
  ]);

  if (!confirm) {
    console.log(chalk.yellow("Dibatalkan."));
    return;
  }

  console.log(chalk.green("Campaign dimulai...\n"));

  const campaign = await createCampaign({
    product,
    targetFile,
    total: targets.length,
  });

  await ensureConnected();

  const socket = getSocket();
  if (!socket) {
    throw new Error("Socket tidak tersedia.");
  }

  const result = await startBroadcast({
    socket,
    product,
    targets,
    campaign,
    onProgress: display.renderProgress,
  });

  display.showCampaignResult(result.stats, result.status);
}

async function runResumeCampaign() {
  const logs = await listCampaignLogs();
  if (!logs.length) {
    console.log(chalk.yellow("Tidak ada log campaign untuk di-resume."));
    return;
  }

  const { logPath } = await inquirer.prompt([
    {
      type: "list",
      name: "logPath",
      message: "Pilih campaign:",
      choices: logs.map((log) => ({ name: log.file, value: log.path })),
    },
  ]);

  const campaign = await loadCampaign(logPath);
  if (!campaign) {
    throw new Error("Gagal membaca log campaign.");
  }

  if (campaign.status === "completed") {
    console.log(chalk.yellow("Campaign sudah selesai."));
    return;
  }

  const catalog = await scanCatalog();
  const category = campaign.product?.category;
  const subcategory = campaign.product?.subcategory;
  const productName = campaign.product?.name;

  if (!catalog?.[category]?.[subcategory]?.includes(productName)) {
    throw new Error("Produk tidak ditemukan di katalog.");
  }

  const meta = await getProductMeta(category, subcategory, productName);
  if (!meta) {
    throw new Error("Produk tidak ditemukan di katalog.");
  }

  const product = await loadProduct(meta.productPath);
  if (!product) {
    throw new Error("Gagal memuat product.json.");
  }

  const { targets } = await parseTargets(campaign.targetFile, { resume: true });
  const remainingTargets = getRemainingTargets(campaign, targets);

  if (!remainingTargets.length) {
    console.log(chalk.green("Semua target sudah diproses."));
    return;
  }

  console.log(chalk.green(`Melanjutkan campaign (${remainingTargets.length} target tersisa)\n`));

  await updateStatus(campaign, "running");

  await ensureConnected();

  const socket = getSocket();
  if (!socket) {
    throw new Error("Socket tidak tersedia.");
  }

  const result = await startBroadcast({
    socket,
    product,
    targets: remainingTargets,
    campaign,
    onProgress: display.renderProgress,
  });

  display.showCampaignResult(result.stats, result.status);
}

async function runHistory() {
  const logs = await listCampaignLogs();
  
  if (!logs.length) {
    console.log(chalk.yellow("Belum ada campaign log."));
    console.log("");
    return;
  }

  const summaries = [];
  for (const log of logs) {
    try {
      const campaign = await loadCampaign(log.path);
      if (!campaign) continue;
      summaries.push({
        file: log.file,
        status: campaign.status || "unknown",
        date: campaign.startTime ? new Date(campaign.startTime).toLocaleString("id-ID") : "-",
        stats: campaign.stats || { total: 0, sent: 0, failed: 0 },
        product: campaign.product?.name || "-",
      });
    } catch {
      summaries.push({ file: log.file, status: "error", date: "-", stats: null, product: "-" });
    }
  }

  display.showCampaignHistory(summaries);
}

async function runSettings() {
  console.log("");
  console.log(chalk.bold("Pengaturan"));
  console.log(chalk.dim(`MAX_PER_HOUR          : ${process.env.MAX_PER_HOUR || "80"}`));
  console.log(chalk.dim(`COOLDOWN_EVERY        : ${process.env.COOLDOWN_EVERY || "30"}`));
  console.log(chalk.dim(`COOLDOWN_DURATION     : ${process.env.COOLDOWN_DURATION_MIN || "60"}-${process.env.COOLDOWN_DURATION_MAX || "120"}s`));
  console.log(chalk.dim(`DELAY                 : ${process.env.DEFAULT_DELAY_MIN || "8"}-${process.env.DEFAULT_DELAY_MAX || "20"}s`));
  console.log(chalk.dim(`MAX_RETRY             : ${process.env.MAX_RETRY || "3"}`));
  console.log(chalk.dim(`TYPING_SIMULATION     : ${process.env.ENABLE_TYPING_SIMULATION || "true"}`));
  console.log(chalk.dim(`RATE_LIMITER          : ${process.env.ENABLE_RATE_LIMITER || "true"}`));
  console.log(chalk.dim(`BLACKLIST             : ${process.env.ENABLE_BLACKLIST || "true"}`));
  console.log("");

  await inquirer.prompt([
    {
      type: "input",
      name: "back",
      message: "Tekan Enter untuk kembali",
    },
  ]);
}

async function runBlacklist() {
  const blacklist = await readJson(BLACKLIST_PATH, []);

  console.log("");
  console.log(chalk.bold("Blacklist (" + blacklist.length + " nomor)"));

  const { action } = await inquirer.prompt([
    {
      type: "list",
      name: "action",
      message: "Pilih aksi:",
      choices: [
        { name: "Tambah Nomor", value: "add" },
        { name: "Hapus Nomor", value: "remove" },
        { name: "Lihat Semua", value: "view" },
        { name: "Kembali", value: "back" },
      ],
    },
  ]);

  if (action === "add") {
    const { number } = await inquirer.prompt([
      {
        type: "input",
        name: "number",
        message: "Nomor (628xxx atau 08xxx):",
        validate: (input) => {
          const trimmed = (input || "").trim();
          if (!trimmed) {
            return "Nomor tidak boleh kosong";
          }
          if (trimmed.length < 10) {
            return "Nomor terlalu pendek (minimal 10 digit)";
          }
          return true;
        },
      },
    ]);

    const validated = validateIndonesianNumber(number);
    if (!validated) {
      console.log(chalk.red("Format nomor tidak valid."));
      console.log(chalk.dim("Gunakan format: 628xxx, 08xxx, atau +628xxx"));
      return;
    }

    const normalized = validated.number;
    if (!blacklist.includes(normalized)) {
      blacklist.push(normalized);
      await writeJson(BLACKLIST_PATH, blacklist);
      console.log(chalk.green(`✓ ${normalized} ditambahkan ke blacklist`));
    } else {
      console.log(chalk.yellow(`${normalized} sudah ada di blacklist`));
    }
  } else if (action === "remove") {
    if (!blacklist.length) {
      console.log(chalk.yellow("Blacklist kosong."));
      return;
    }

    const { number } = await inquirer.prompt([
      {
        type: "list",
        name: "number",
        message: "Pilih nomor:",
        choices: blacklist.map((n) => ({ name: n, value: n })),
      },
    ]);

    const index = blacklist.indexOf(number);
    if (index > -1) {
      blacklist.splice(index, 1);
      await writeJson(BLACKLIST_PATH, blacklist);
      console.log(chalk.green(`✓ ${number} dihapus`));
    }
  } else if (action === "view") {
    if (!blacklist.length) {
      console.log(chalk.yellow("Blacklist kosong."));
      return;
    }

    blacklist.forEach((num, idx) => {
      console.log(`  ${idx + 1}. ${chalk.white(num)}`);
    });
    console.log("");
  }
}

async function runCatalogManagement() {
  const CAMPAIGNS_DIR = path.join(process.cwd(), "campaigns");
  const { listDirs } = require("../utils/fileHelper");

  console.log("");
  console.log(chalk.bold("Katalog Produk"));

  const { action } = await inquirer.prompt([
    {
      type: "list",
      name: "action",
      message: "Pilih aksi:",
      choices: [
        { name: "Tambah Produk Baru", value: "add_product" },
        { name: "Buat Kategori Baru", value: "add_category" },
        { name: "Buat Subkategori Baru", value: "add_subcategory" },
        { name: "Kembali", value: "back" },
      ],
    },
  ]);

  if (action === "add_category") {
    const { categoryName } = await inquirer.prompt([
      {
        type: "input",
        name: "categoryName",
        message: "Nama kategori:",
        validate: (input) => {
          const trimmed = (input || "").trim();
          if (!trimmed) {
            return "Nama kategori tidak boleh kosong";
          }
          if (trimmed.length < 2) {
            return "Nama kategori minimal 2 karakter";
          }
          return true;
        },
      },
    ]);

    const cleanName = categoryName.trim();
    const categoryPath = path.join(CAMPAIGNS_DIR, cleanName);

    if (await fs.pathExists(categoryPath)) {
      console.log(chalk.yellow(`Kategori "${cleanName}" sudah ada.`));
      return;
    }

    await fs.ensureDir(categoryPath);
    console.log(chalk.green(`✓ Kategori "${cleanName}" dibuat`));
  } else if (action === "add_subcategory") {
    const categories = await listDirs(CAMPAIGNS_DIR);

    if (!categories.length) {
      console.log(chalk.red("Belum ada kategori."));
      return;
    }

    const { category } = await inquirer.prompt([
      {
        type: "list",
        name: "category",
        message: "Pilih kategori:",
        choices: categories,
      },
    ]);

    const { subcategoryName } = await inquirer.prompt([
      {
        type: "input",
        name: "subcategoryName",
        message: "Nama subkategori:",
        validate: (input) => {
          const trimmed = (input || "").trim();
          if (!trimmed) {
            return "Nama subkategori tidak boleh kosong";
          }
          if (trimmed.length < 2) {
            return "Nama subkategori minimal 2 karakter";
          }
          return true;
        },
      },
    ]);

    const cleanName = subcategoryName.trim();
    const subcategoryPath = path.join(CAMPAIGNS_DIR, category, cleanName);

    if (await fs.pathExists(subcategoryPath)) {
      console.log(chalk.yellow(`Subkategori "${cleanName}" sudah ada.`));
      return;
    }

    await fs.ensureDir(subcategoryPath);
    console.log(chalk.green(`✓ Subkategori "${cleanName}" dibuat di ${category}`));
  } else if (action === "add_product") {
    const categories = await listDirs(CAMPAIGNS_DIR);

    if (!categories.length) {
      console.log(chalk.red("Belum ada kategori."));
      return;
    }

    const { category } = await inquirer.prompt([
      {
        type: "list",
        name: "category",
        message: "Pilih kategori:",
        choices: categories,
      },
    ]);

    const subcategories = await listDirs(path.join(CAMPAIGNS_DIR, category));

    if (!subcategories.length) {
      console.log(chalk.red("Belum ada subkategori."));
      return;
    }

    const { subcategory } = await inquirer.prompt([
      {
        type: "list",
        name: "subcategory",
        message: "Pilih subkategori:",
        choices: subcategories,
      },
    ]);

    const productInfo = await inquirer.prompt([
      {
        type: "input",
        name: "productName",
        message: "Nama produk:",
        validate: (input) => {
          const trimmed = (input || "").trim();
          if (!trimmed) {
            return "Nama produk tidak boleh kosong";
          }
          if (trimmed.length < 3) {
            return "Nama produk minimal 3 karakter";
          }
          return true;
        },
      },
      {
        type: "input",
        name: "description",
        message: "Deskripsi:",
        default: "Produk berkualitas tinggi",
      },
      {
        type: "number",
        name: "priceOriginal",
        message: "Harga asli (Rp):",
        default: 100000,
        validate: (input) => {
          const num = Number(input);
          if (!num || num <= 0) {
            return "Harga harus lebih dari 0";
          }
          return true;
        },
      },
      {
        type: "number",
        name: "priceDiscount",
        message: "Harga diskon (Rp):",
        default: 75000,
        validate: (input, answers) => {
          const num = Number(input);
          if (!num || num <= 0) {
            return "Harga harus lebih dari 0";
          }
          if (num >= answers.priceOriginal) {
            return "Harga diskon harus lebih kecil dari harga asli";
          }
          return true;
        },
      },
    ]);

    const slug = productInfo.productName.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "");
    
    if (!slug) {
      console.log(chalk.red("Nama produk tidak valid untuk slug."));
      return;
    }
    
    const productPath = path.join(CAMPAIGNS_DIR, category, subcategory, slug);

    if (await fs.pathExists(productPath)) {
      console.log(chalk.yellow(`Produk dengan slug "${slug}" sudah ada.`));
      console.log(chalk.dim("Gunakan nama yang berbeda atau hapus produk lama."));
      return;
    }

    await fs.ensureDir(path.join(productPath, "templates"));
    await fs.ensureDir(path.join(productPath, "images"));

    const productJson = {
      id: slug,
      name: productInfo.productName.trim(),
      category,
      subcategory,
      price: {
        original: productInfo.priceOriginal,
        discounted: productInfo.priceDiscount,
        currency: "IDR",
      },
      description: productInfo.description.trim(),
      cta: {
        text: "Hubungi Sekarang",
        link: "https://wa.me/628xxx",
        type: "whatsapp",
      },
      broadcast: {
        sendImage: true,
        imageMode: "random",
        templateMode: "random",
        delay: {
          min: 8,
          max: 20,
        },
      },
      variables: {
        stok: "Terbatas",
        garansi: "1 Tahun",
        lokasi: "Indonesia",
      },
      active: true,
    };

    await writeJson(path.join(productPath, "product.json"), productJson);

    const defaultTemplate = `Halo {{nama}} 👋

Kami punya penawaran spesial untuk kamu hari ini!

🛍️ *{{produk}}*
💰 ~~Rp {{harga_asli}}~~ → *Rp {{harga_diskon}}*
📦 Stok: {{stok}}
🛡️ Garansi: {{garansi}}

{{deskripsi}}

📲 *{{cta_text}}*: {{cta_link}}

_Balas pesan ini untuk info lebih lanjut_ 🙏`;

    await fs.writeFile(
      path.join(productPath, "templates", "template.txt"),
      defaultTemplate,
      "utf8"
    );

    const placeholderImage = Buffer.from(
      "iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==",
      "base64"
    );
    await fs.writeFile(
      path.join(productPath, "images", "product.jpg"),
      placeholderImage
    );

    console.log(chalk.green(`✓ Produk "${productInfo.productName}" dibuat`));
    console.log(chalk.dim(`  Path: ${productPath}`));
    console.log(chalk.dim("  Jangan lupa ganti gambar & template placeholder"));
    console.log("");
  }
}

async function runResetSession() {
  console.log("");
  console.log(chalk.bold("Reset Session WhatsApp"));
  console.log(chalk.dim("Ini akan menghapus session dan memerlukan scan QR ulang."));

  const { confirm } = await inquirer.prompt([
    {
      type: "confirm",
      name: "confirm",
      message: "Yakin reset session?",
      default: false,
    },
  ]);

  if (!confirm) {
    console.log(chalk.yellow("Dibatalkan."));
    return;
  }

  try {
    console.log(chalk.dim("Memutuskan koneksi..."));
    await disconnect();

    console.log(chalk.dim("Menghapus session..."));
    await clearSession();

    console.log(chalk.green("Session berhasil direset."));
    console.log(chalk.dim("Restart aplikasi dan scan QR code."));

    process.exit(0);
  } catch (error) {
    console.log(chalk.red(`Gagal: ${error.message}`));
  }
}

async function startMenu() {
  display.renderBanner();

  // Wait for WhatsApp connection (shows QR if no session)
  await ensureConnected();

  let exitRequested = false;

  while (!exitRequested) {
    const { action } = await inquirer.prompt([
      {
        type: "list",
        name: "action",
        message: chalk.bold("Menu"),
        pageSize: 10,
        choices: [
          { name: "Campaign Baru", value: "new" },
          { name: "Lanjutkan Campaign (Resume)", value: "resume" },
          { name: "Riwayat Campaign", value: "history" },
          { name: "Katalog Produk", value: "catalog" },
          { name: "Blacklist", value: "blacklist" },
          { name: "Reset Session", value: "reset_session" },
          { name: "Pengaturan", value: "settings" },
          { name: "Keluar", value: "exit" },
        ],
      },
    ]);

    try {
      if (action === "new") {
        await runNewCampaign();
      } else if (action === "resume") {
        await runResumeCampaign();
      } else if (action === "history") {
        await runHistory();
      } else if (action === "catalog") {
        await runCatalogManagement();
      } else if (action === "blacklist") {
        await runBlacklist();
      } else if (action === "reset_session") {
        await runResetSession();
      } else if (action === "settings") {
        await runSettings();
      } else if (action === "exit") {
        console.log(chalk.yellow("\nMenghentikan bot..."));
        await disconnect();
        console.log(chalk.green("Selesai. Terima kasih!"));
        exitRequested = true;
      }
    } catch (error) {
      logger.error(`Menu error: ${error.message}`);
      console.log(chalk.red(`Error: ${error.message}`));
    }

    if (!exitRequested) {
      await sleep(randomBetween(300, 700));
    }
  }

  process.exit(0);
}

module.exports = { startMenu };
