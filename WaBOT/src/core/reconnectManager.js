const { logger } = require("../utils/logger");
const { sleep } = require("../utils/formatter");

/**
 * Reconnection manager with exponential backoff.
 * Handles connection retries with intelligent delays.
 * Prevents reconnection loops and connection storms.
 */
class ReconnectManager {
  constructor(options = {}) {
    this.maxRetries = options.maxRetries || 10;
    this.baseDelay = options.baseDelay || 1000;
    this.maxDelay = options.maxDelay || 60000;
    this.retryCount = 0;
    this.lastAttempt = null;
    this.isReconnecting = false;
  }

  /**
   * Calculate delay for next retry using exponential backoff.
   * Returns delay in milliseconds with jitter.
   * Caps at maxDelay to prevent excessive waits.
   */
  getNextDelay() {
    const exponentialDelay = this.baseDelay * Math.pow(2, this.retryCount);
    const cappedDelay = Math.min(exponentialDelay, this.maxDelay);
    const jitter = cappedDelay * (0.5 + Math.random() * 0.5);
    return Math.floor(jitter);
  }

  /**
   * Check if should attempt reconnection.
   * Returns false if max retries exceeded.
   * Considers cooldown period between attempts.
   */
  shouldRetry() {
    if (this.retryCount >= this.maxRetries) {
      return false;
    }

    if (this.lastAttempt) {
      const timeSinceLastAttempt = Date.now() - this.lastAttempt;
      const minTimeBetweenAttempts = 5000;
      
      if (timeSinceLastAttempt < minTimeBetweenAttempts) {
        return false;
      }
    }

    return true;
  }

  /**
   * Execute reconnection attempt with backoff.
   * Accepts async reconnect function.
   * Returns true if reconnection successful.
   */
  async attemptReconnect(reconnectFn) {
    if (this.isReconnecting) return false;
    if (!this.shouldRetry()) return false;

    this.isReconnecting = true;
    this.retryCount += 1;
    this.lastAttempt = Date.now();

    const delay = this.getNextDelay();
    logger.info(
      `Reconnection attempt ${this.retryCount}/${this.maxRetries} after ${delay}ms`,
    );

    try {
      await sleep(delay);
      await reconnectFn();
      return true;
    } catch (error) {
      logger.error(`Reconnection attempt ${this.retryCount} failed: ${error.message}`);
      return false;
    } finally {
      this.isReconnecting = false;
    }
  }

  /**
   * Reset reconnection state after successful connection.
   * Clears retry count and attempt timestamp.
   * Called automatically on successful reconnect.
   */
  reset() {
    this.retryCount = 0;
    this.lastAttempt = null;
    this.isReconnecting = false;
  }

  /**
   * Get current reconnection status.
   * Returns stats object with retry info.
   * Useful for monitoring.
   */
  getStatus() {
    return {
      retryCount: this.retryCount,
      maxRetries: this.maxRetries,
      isReconnecting: this.isReconnecting,
      lastAttempt: this.lastAttempt,
    };
  }
}

/**
 * Health monitor for connection stability.
 * Tracks ping/pong and connection quality.
 * Triggers reconnection on health degradation.
 */
class ConnectionHealthMonitor {
  constructor(options = {}) {
    this.pingInterval = options.pingInterval || 30000;
    this.pingTimeout = options.pingTimeout || 10000;
    this.maxFailedPings = options.maxFailedPings || 3;
    this.failedPingCount = 0;
    this.lastPingTime = null;
    this.lastPongTime = null;
    this.monitorInterval = null;
    this.isHealthy = true;
  }

  /**
   * Start health monitoring loop.
   * Sends periodic pings to check connection.
   * Accepts ping function and unhealthy callback.
   */
  start(pingFn, onUnhealthy) {
    if (this.monitorInterval) {
      return;
    }

    this.monitorInterval = setInterval(async () => {
      await this.performHealthCheck(pingFn, onUnhealthy);
    }, this.pingInterval);

    logger.info("Connection health monitoring started");
  }

  /**
   * Stop health monitoring.
   * Clears interval and resets state.
   * Safe to call multiple times.
   */
  stop() {
    if (this.monitorInterval) {
      clearInterval(this.monitorInterval);
      this.monitorInterval = null;
    }
    
    this.reset();
    logger.info("Connection health monitoring stopped");
  }

  /**
   * Perform single health check.
   * Calls ping function and waits for response.
   * Triggers callback if unhealthy threshold reached.
   */
  async performHealthCheck(pingFn, onUnhealthy) {
    try {
      this.lastPingTime = Date.now();

      const timeout = new Promise((_, reject) =>
        setTimeout(() => reject(new Error("Ping timeout")), this.pingTimeout)
      );

      await Promise.race([pingFn(), timeout]);

      this.lastPongTime = Date.now();
      this.failedPingCount = 0;
      this.isHealthy = true;
    } catch (error) {
      this.failedPingCount += 1;
      logger.warn(`Health check failed (${this.failedPingCount}/${this.maxFailedPings}): ${error.message}`);

      if (this.failedPingCount >= this.maxFailedPings) {
        this.isHealthy = false;
        logger.error("Connection unhealthy, triggering recovery");
        if (typeof onUnhealthy === "function") {
          onUnhealthy();
        }
      }
    }
  }

  /**
   * Reset health monitor state.
   * Called after successful reconnection.
   * Clears failure counters.
   */
  reset() {
    this.failedPingCount = 0;
    this.lastPingTime = null;
    this.lastPongTime = null;
    this.isHealthy = true;
  }

  /**
   * Get health status.
   * Returns status object with metrics.
   * Useful for monitoring dashboard.
   */
  getStatus() {
    return {
      isHealthy: this.isHealthy,
      failedPingCount: this.failedPingCount,
      maxFailedPings: this.maxFailedPings,
      lastPingTime: this.lastPingTime,
      lastPongTime: this.lastPongTime,
      latency: this.lastPongTime && this.lastPingTime 
        ? this.lastPongTime - this.lastPingTime 
        : null,
    };
  }
}

module.exports = {
  ReconnectManager,
  ConnectionHealthMonitor,
};
