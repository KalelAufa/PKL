const { formatDuration } = require("../utils/formatter");

/**
 * Track broadcast progress stats in memory.
 * Records success, failure, and skipped counts.
 * Provides elapsed time and remaining count.
 */
class ProgressTracker {
  /**
   * Create a new progress tracker.
   * Accepts total target count.
   * Initializes start timestamp and counters.
   */
  constructor(total) {
    this.total = Number(total) || 0;
    this.sent = 0;
    this.failed = 0;
    this.skipped = 0;
    this.startTime = Date.now();
  }

  /**
   * Mark a successful send.
   * Increments the sent counter.
   * Returns current stats snapshot.
   */
  markSuccess() {
    this.sent += 1;
    return this.getStats();
  }

  /**
   * Mark a failed send attempt.
   * Increments the failed counter.
   * Returns current stats snapshot.
   */
  markFailed() {
    this.failed += 1;
    return this.getStats();
  }

  /**
   * Mark a skipped target.
   * Increments the skipped counter.
   * Returns current stats snapshot.
   */
  markSkipped() {
    this.skipped += 1;
    return this.getStats();
  }

  /**
   * Calculate remaining targets.
   * Returns the remaining count.
   * Never returns a negative number.
   */
  getRemaining() {
    const processed = this.sent + this.failed + this.skipped;
    return Math.max(0, this.total - processed);
  }

  /**
   * Return current progress statistics.
   * Includes elapsed time and percentage completion.
   * Suitable for progress UI output.
   */
  getStats() {
    const processed = this.sent + this.failed + this.skipped;
    const percent = this.total ? (processed / this.total) * 100 : 0;

    return {
      total: this.total,
      sent: this.sent,
      failed: this.failed,
      skipped: this.skipped,
      remaining: this.getRemaining(),
      elapsedMs: Date.now() - this.startTime,
      elapsed: formatDuration(Date.now() - this.startTime),
      percent: Number(percent.toFixed(2)),
    };
  }
}

module.exports = { ProgressTracker };
