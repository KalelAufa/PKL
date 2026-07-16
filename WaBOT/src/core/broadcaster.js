const path = require("path");
const fs = require("fs-extra");
const { logger } = require("../utils/logger");
const { RateLimiter } = require("./rateLimiter");
const {
  randomBetween,
  jitter,
  sleep,
  pickRandom,
  padMessage,
} = require("../utils/formatter");
const {
  renderTemplate,
  loadTemplate,
  buildVariableMap,
} = require("../catalog/templateEngine");
const {
  appendResult,
  updateStatus,
  updateSentHistory,
} = require("../campaign/campaignManager");
const { ProgressTracker } = require("../campaign/progressTracker");

/**
 * Resolve delay configuration with defaults.
 * Reads fallback values from environment variables.
 * Returns a { min, max } object in seconds.
 */
function resolveDelayConfig(product) {
  const fallbackMin = Number(process.env.DEFAULT_DELAY_MIN || 8);
  const fallbackMax = Number(process.env.DEFAULT_DELAY_MAX || 20);
  const delay = product?.broadcast?.delay || {};
  const min = Number(delay.min || fallbackMin);
  const max = Number(delay.max || fallbackMax);

  return {
    min: Number.isFinite(min) && min >= 0 ? min : 8,
    max: Number.isFinite(max) && max >= 0 ? max : 20,
  };
}

/**
 * Determine whether the broadcast should send an image.
 * Requires both sendImage flag and available image files.
 * Returns true when image sending is enabled.
 */
function shouldSendImage(product) {
  return Boolean(product?.broadcast?.sendImage && product?.images?.length);
}

/**
 * Read an asset once and reuse it for repeated random selections.
 * Keeps broadcasts from hitting disk for every target.
 */
async function getCachedAsset(cache, filePath, loader) {
  if (!filePath) {
    return null;
  }

  if (!cache.has(filePath)) {
    cache.set(filePath, await loader(filePath));
  }

  return cache.get(filePath);
}

/**
 * Send a message with retry logic.
 * Attempts up to maxRetry times before throwing the error.
 * Returns the message info from Baileys.
 */
async function sendWithRetry(task, maxRetry) {
  let lastError;
  for (let attempt = 1; attempt <= maxRetry; attempt++) {
    try {
      return await task();
    } catch (error) {
      lastError = error;
      logger.warn(`Send attempt ${attempt} failed: ${error.message}`);
      await sleep(1000 * attempt);
    }
  }
  throw lastError;
}

/**
 * Run the broadcast process sequentially for all targets.
 * Handles anti-ban timing, retry, logging, and progress updates.
 * Returns a summary status when finished.
 */
async function startBroadcast({
  socket,
  product,
  targets,
  campaign,
  onProgress,
}) {
  if (!socket) {
    throw new Error("Socket is not connected.");
  }

  const maxRetry = Math.max(1, Number(process.env.MAX_RETRY || 3) || 3);
  const cooldownEvery = Number(process.env.COOLDOWN_EVERY || 30);
  const cooldownMin = Number(process.env.COOLDOWN_DURATION_MIN || 60);
  const cooldownMax = Number(process.env.COOLDOWN_DURATION_MAX || 120);
  const typingEnabled =
    String(process.env.ENABLE_TYPING_SIMULATION || "true") === "true";
  const limiterEnabled =
    String(process.env.ENABLE_RATE_LIMITER || "true") === "true";

  const limiter = new RateLimiter(
    Number(process.env.MAX_PER_HOUR || 80),
    limiterEnabled,
  );
  const tracker = new ProgressTracker(targets.length);
  const delayConfig = resolveDelayConfig(product);
  const templateCache = new Map();
  const imageCache = new Map();

  let stopRequested = false;

  const stopHandler = () => {
    stopRequested = true;
  };

  process.on("SIGINT", stopHandler);

  try {
    for (let targetIndex = 0; targetIndex < targets.length; targetIndex += 1) {
      const target = targets[targetIndex];
      const hasNextTarget = targetIndex < targets.length - 1;

      if (stopRequested) {
        logger.warn("Broadcast stopped by user.");
        await updateStatus(campaign, "paused");
        break;
      }

      await limiter.waitForSlot();

      const templatePath = pickRandom(product.templates);
      const imagePath = shouldSendImage(product)
        ? pickRandom(product.images)
        : null;

      try {
        const templateText = await getCachedAsset(
          templateCache,
          templatePath,
          loadTemplate,
        );
        const variables = buildVariableMap({ target, product });
        const messageText = padMessage(renderTemplate(templateText, variables));

        if (typingEnabled && socket) {
          try {
            await socket.sendPresenceUpdate("composing", target.jid);
            await sleep(jitter(randomBetween(1000, 3000)));
            await socket.sendPresenceUpdate("paused", target.jid);
          } catch (presenceError) {
            // Silently ignore presence errors
          }
        }

        const sendTask = async () => {
          if (imagePath) {
            const imageBuffer = await getCachedAsset(
              imageCache,
              imagePath,
              fs.readFile,
            );
            return await socket.sendMessage(target.jid, {
              image: imageBuffer,
              caption: messageText,
            });
          }

          return await socket.sendMessage(target.jid, { text: messageText });
        };

        await sendWithRetry(sendTask, maxRetry);
        limiter.recordSend();
        tracker.markSuccess();
        await updateSentHistory(target.number);

        await appendResult(campaign, {
          number: target.number,
          name: target.name,
          status: "success",
          template: templatePath ? path.basename(templatePath) : null,
          image: imagePath ? path.basename(imagePath) : null,
          timestamp: new Date().toISOString(),
          error: null,
        });
      } catch (error) {
        logger.error(`Failed to send to ${target.number}: ${error.message}`);
        tracker.markFailed();

        await appendResult(campaign, {
          number: target.number,
          name: target.name,
          status: "failed",
          template: templatePath ? path.basename(templatePath) : null,
          image: imagePath ? path.basename(imagePath) : null,
          timestamp: new Date().toISOString(),
          error: error.message,
        });
      }

      if (typeof onProgress === "function") {
        onProgress(tracker.getStats());
      }

      const stats = tracker.getStats();
      const processedCount = stats.sent + stats.failed + stats.skipped;

      if (
        hasNextTarget &&
        cooldownEvery > 0 &&
        processedCount > 0 &&
        processedCount % cooldownEvery === 0
      ) {
        const cooldownMs = randomBetween(cooldownMin, cooldownMax) * 1000;
        await sleep(jitter(cooldownMs));
      }

      if (hasNextTarget) {
        const delaySeconds = randomBetween(delayConfig.min, delayConfig.max);
        await sleep(jitter(delaySeconds * 1000));
      }
    }
  } catch (error) {
    await updateStatus(campaign, "failed");
    throw error;
  } finally {
    process.off("SIGINT", stopHandler);
  }

  if (!stopRequested) {
    await updateStatus(campaign, "completed");
  }

  return {
    status: stopRequested ? "paused" : "completed",
    stats: tracker.getStats(),
  };
}

module.exports = { startBroadcast };
