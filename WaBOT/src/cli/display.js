const chalk = require("chalk");
const { formatDuration } = require("../utils/formatter");

function renderBanner() {
  console.clear();
  console.log(chalk.cyan.bold("Wa Broadcast Bot") + chalk.gray(" — WhatsApp Automation CLI"));
  console.log("");
}

function renderProgress(stats) {
  const total = stats.total || 0;
  const completed = stats.sent + stats.failed + stats.skipped;
  const percent = total ? Math.round((completed / total) * 100) : 0;
  const barLength = 20;
  const filled = Math.round((percent / 100) * barLength);
  const empty = barLength - filled;
  const bar = `${chalk.green("█".repeat(filled))}${chalk.gray("░".repeat(empty))}`;

  process.stdout.write(
    `\r${bar} ${chalk.bold(percent + "%")}` +
    `  ${chalk.green("✓" + stats.sent)} ${chalk.red("✗" + stats.failed)} ${chalk.gray(stats.elapsed || formatDuration(stats.elapsedMs || 0))}`
  );

  if (completed === total) {
    console.log("");
  }
}

function showCampaignSummary({ product, targetCount, estimateSeconds }) {
  console.log(chalk.bold("Ringkasan Campaign"));
  console.log(`  Produk      : ${chalk.white(product?.name || "-")}`);
  console.log(`  Kategori    : ${chalk.white(`${product?.category || "-"} > ${product?.subcategory || "-"}`)}`);
  console.log(`  Target      : ${chalk.white(targetCount + " kontak")}`);
  console.log(`  Estimasi    : ${chalk.white(formatDuration(estimateSeconds * 1000))}`);
  console.log("");
}

function showCampaignHistory(logs) {
  if (!logs.length) {
    console.log(chalk.yellow("Belum ada campaign log."));
    console.log("");
    return;
  }

  console.log(chalk.bold("Riwayat Campaign"));
  console.log("");

  logs.forEach((log, i) => {
    const statusColor = {
      completed: chalk.green,
      running: chalk.cyan,
      paused: chalk.yellow,
      failed: chalk.red,
    }[log.status] || chalk.gray;

    const progress = log.stats
      ? `${log.stats.sent}/${log.stats.total} terkirim`
      : "";

    console.log(`  ${i + 1}. ${chalk.white(log.file)}`);
    console.log(`     ${statusColor(log.status)} ${chalk.dim(log.date)} ${chalk.dim(progress)}`);
    console.log(`     ${chalk.dim(log.product)}`);
    console.log("");
  });
}

function showCampaignResult(stats, status) {
  const label = status === "completed" ? chalk.green("Selesai") : chalk.yellow("Dijeda");
  console.log(chalk.bold("Hasil Campaign"));
  console.log(`  Status   : ${label}`);
  console.log(`  Total    : ${chalk.white(stats.total)}`);
  console.log(`  Berhasil : ${chalk.green(stats.sent)}`);
  console.log(`  Gagal    : ${chalk.red(stats.failed)}`);
  console.log(`  Durasi   : ${chalk.white(stats.elapsed || formatDuration(stats.elapsedMs || 0))}`);
  console.log("");
}

module.exports = {
  renderBanner,
  renderProgress,
  showCampaignSummary,
  showCampaignHistory,
  showCampaignResult,
};
