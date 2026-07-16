/**
 * Remove duplicate targets based on normalized number.
 * Keeps the first occurrence and removes subsequent duplicates.
 * Returns a new array of unique targets.
 */
function deduplicateTargets(targets) {
  const seen = new Set();

  return targets.filter((target) => {
    if (seen.has(target.number)) {
      return false;
    }

    seen.add(target.number);
    return true;
  });
}

module.exports = { deduplicateTargets };
