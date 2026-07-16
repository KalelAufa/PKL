/**
 * Filter targets that were already processed in a campaign.
 * Uses campaign.results to remove processed numbers.
 * Returns only remaining targets.
 */
function getRemainingTargets(campaign, targets) {
  const processed = new Set(
    (campaign.results || []).map((result) => result.number),
  );
  return targets.filter((target) => !processed.has(target.number));
}

module.exports = { getRemainingTargets };
