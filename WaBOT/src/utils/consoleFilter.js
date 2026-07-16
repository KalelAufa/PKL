const SESSION_LOG_PREFIXES = new Set([
  "Closing session:",
  "Opening session:",
  "Removing old closed session:",
  "Migrating session to:",
]);

const SESSION_WARN_PREFIXES = new Set([
  "Session already closed",
  "Session already open",
]);

let installed = false;

function shouldSuppress(args, prefixes) {
  const first = args[0];
  return typeof first === "string" && prefixes.has(first);
}

/**
 * Suppress noisy libsignal session lifecycle logs emitted via console.
 * Baileys logger settings do not catch these because they bypass pino/winston.
 */
function installConsoleFilters() {
  if (installed) {
    return;
  }

  const originalInfo = console.info.bind(console);
  const originalWarn = console.warn.bind(console);

  console.info = (...args) => {
    if (shouldSuppress(args, SESSION_LOG_PREFIXES)) {
      return;
    }

    originalInfo(...args);
  };

  console.warn = (...args) => {
    if (shouldSuppress(args, SESSION_WARN_PREFIXES)) {
      return;
    }

    originalWarn(...args);
  };

  installed = true;
}

module.exports = { installConsoleFilters };
