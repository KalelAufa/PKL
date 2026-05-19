"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useState } from "react";
import { companyProfile, navItems } from "@/app/data/site-content";

/**
 * Sticky global header with desktop navigation and mobile drawer menu.
 */
export function SiteHeader() {
  const pathname = usePathname();
  const [isOpen, setIsOpen] = useState(false);

  return (
    <header className="sticky top-0 z-50 border-b border-(--color-border-soft) bg-[rgba(249,249,246,0.92)] backdrop-blur-md">
      <div className="site-container flex h-18 items-center justify-between gap-4">
        <Link
          href="/"
          className="text-lg font-semibold tracking-tight text-(--color-primary)">
          {companyProfile.companyName}
        </Link>

        <nav
          className="hidden items-center gap-10 md:flex"
          aria-label="Navigasi utama">
          {navItems.map((item) => {
            const isActive = pathname === item.href;
            return (
              <Link
                key={item.href}
                href={item.href}
                className={`border-b-2 pb-1 text-xs font-semibold uppercase tracking-[0.14em] transition-colors ${
                  isActive
                    ? "border-(--color-accent) text-(--color-primary)"
                    : "border-transparent text-(--color-text)/80 hover:text-(--color-primary)"
                }`}>
                {item.label}
              </Link>
            );
          })}
        </nav>

        <button
          type="button"
          className="inline-flex h-11 w-11 items-center justify-center rounded-full border border-(--color-border) text-(--color-primary) md:hidden"
          onClick={() => setIsOpen((current) => !current)}
          aria-label="Buka atau tutup menu navigasi"
          aria-expanded={isOpen}>
          {isOpen ? (
            <svg
              viewBox="0 0 24 24"
              className="h-5 w-5"
              fill="none"
              aria-hidden="true">
              <path
                d="M6 6l12 12M18 6 6 18"
                stroke="currentColor"
                strokeWidth="1.8"
                strokeLinecap="round"
              />
            </svg>
          ) : (
            <svg
              viewBox="0 0 24 24"
              className="h-5 w-5"
              fill="none"
              aria-hidden="true">
              <path
                d="M4 7h16M4 12h16M4 17h16"
                stroke="currentColor"
                strokeWidth="1.8"
                strokeLinecap="round"
              />
            </svg>
          )}
        </button>
      </div>

      {isOpen ? (
        <div className="border-t border-(--color-border-soft) bg-(--color-surface) md:hidden">
          <nav
            className="site-container flex flex-col gap-4 py-5"
            aria-label="Navigasi seluler">
            {navItems.map((item) => {
              const isActive = pathname === item.href;
              return (
                <Link
                  key={item.href}
                  href={item.href}
                  className={`rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.12em] ${
                    isActive
                      ? "bg-(--color-primary) text-white"
                      : "bg-white text-foreground"
                  }`}
                  onClick={() => setIsOpen(false)}>
                  {item.label}
                </Link>
              );
            })}
          </nav>
        </div>
      ) : null}
    </header>
  );
}
