"use client";

import type { ReactNode } from "react";

type OverlayModalProps = {
  isOpen: boolean;
  onClose: () => void;
  title: string;
  children: ReactNode;
};

/**
 * Generic modal for optional quick-product previews.
 */
export function OverlayModal({
  isOpen,
  onClose,
  title,
  children,
}: OverlayModalProps) {
  if (!isOpen) {
    return null;
  }

  return (
    <div className="fixed inset-0 z-[60] flex items-center justify-center bg-[rgba(26,28,27,0.72)] px-4 py-8">
      <div className="w-full max-w-2xl rounded-2xl border border-[var(--color-border)] bg-white p-6 shadow-2xl">
        <div className="flex items-start justify-between gap-4">
          <h3 className="text-xl font-semibold text-[var(--color-primary)]">
            {title}
          </h3>
          <button
            type="button"
            onClick={onClose}
            className="rounded-md px-3 py-1 text-sm font-medium text-[var(--color-muted)] hover:bg-[var(--color-surface-soft)]">
            Close
          </button>
        </div>

        <div className="mt-4 text-[var(--color-text)]">{children}</div>
      </div>
    </div>
  );
}
