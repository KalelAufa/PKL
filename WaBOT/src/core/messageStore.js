const { logger } = require("../utils/logger");

// Message store for getMessage (retry & poll votes)
const messageStore = new Map();
const MAX_MESSAGES = 1000;

// Group metadata cache with TTL (5 minutes)
const groupCache = new Map();
const GROUP_CACHE_TTL = 5 * 60 * 1000; // 5 minutes in ms

/**
 * Store message for later retrieval
 * Used by Baileys for retrying failed messages and decrypting poll votes
 */
function storeMessage(msg) {
  if (!msg?.key?.id) return;

  const key = msg.key.id;
  messageStore.set(key, msg);

  // Keep store size limited
  if (messageStore.size > MAX_MESSAGES) {
    const firstKey = messageStore.keys().next().value;
    messageStore.delete(firstKey);
  }
}

/**
 * Retrieve message by key
 * Required for Baileys getMessage config
 */
async function getMessage(key) {
  if (!key?.id) return undefined;
  
  const msg = messageStore.get(key.id);
  if (msg) {
    logger.debug(`getMessage: found ${key.id}`);
  }
  return msg;
}

/**
 * Store group metadata in cache with TTL
 */
function storeGroupMetadata(jid, metadata) {
  if (!jid || !metadata) return;
  groupCache.set(jid, {
    data: metadata,
    expiry: Date.now() + GROUP_CACHE_TTL,
  });
  logger.debug(`Stored group metadata for ${jid}`);
}

/**
 * Get cached group metadata (respects TTL)
 * Required for Baileys cachedGroupMetadata config
 */
async function getCachedGroupMetadata(jid) {
  if (!jid) return undefined;
  
  const cached = groupCache.get(jid);
  if (!cached) return undefined;

  // Check if expired
  if (Date.now() > cached.expiry) {
    groupCache.delete(jid);
    return undefined;
  }
  
  logger.debug(`cachedGroupMetadata: found ${jid}`);
  return cached.data;
}

/**
 * Clear all caches
 */
function clearAll() {
  messageStore.clear();
  groupCache.clear();
  logger.info("Cleared all message and group caches");
}

module.exports = {
  storeMessage,
  getMessage,
  storeGroupMetadata,
  getCachedGroupMetadata,
  clearAll,
};
