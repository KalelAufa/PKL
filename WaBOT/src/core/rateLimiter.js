const { sleep } = require("../utils/formatter");

/**
 * In-memory rate limiter for per-hour limits.
 * Stores timestamps of sent messages.
 * Supports waiting for the next available slot.
 */
class RateLimiter {
  /**
   * Create a new rate limiter instance.
   * Accepts a max-per-hour value and enable flag.
   * Disabled limiter always allows sending.
   */
  constructor(maxPerHour, enabled = true) {
    this.maxPerHour = Number(maxPerHour) || 0;
    this.enabled = Boolean(enabled);
    this.timestamps = [];
    this.windowMs = 60 * 60 * 1000;
  }

  /**
   * Remove timestamps that are outside the current time window.
   * Keeps only the last one hour of activity.
   * Called internally before checks.
   */
  purgeOld() {
    const cutoff = Date.now() - this.windowMs;
    this.timestamps = this.timestamps.filter((ts) => ts >= cutoff);
  }

  /**
   * Determine if a send action is currently allowed.
   * Returns true when under the hourly limit.
   * Disabled limiter always returns true.
   */
  canSend() {
    if (!this.enabled || this.maxPerHour <= 0) {
      return true;
    }

    this.purgeOld();
    return this.timestamps.length < this.maxPerHour;
  }

  /**
   * Record a send action timestamp.
   * Call after a successful send.
   * Keeps the queue ordered by time.
   */
  recordSend() {
    if (!this.enabled || this.maxPerHour <= 0) {
      return;
    }

    this.timestamps.push(Date.now());
    this.purgeOld();
  }

  /**
   * Wait until a send slot is available.
   * Resolves immediately if within limit.
   * Sleeps until the earliest timestamp expires.
   */
  async waitForSlot() {
    if (this.canSend()) {
      return;
    }

    this.purgeOld();

    const oldest = this.timestamps[0];
    const waitMs = Math.max(0, oldest + this.windowMs - Date.now() + 1000);
    await sleep(waitMs);
  }
}

module.exports = { RateLimiter };
