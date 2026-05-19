import Link from "next/link";
import {
  companyProfile,
  footerColumns,
  footerNote,
  navItems,
} from "@/app/data/site-content";

/**
 * Shared footer used on every route to keep brand and navigation consistent.
 *
 * Layout:
 * - Left: brand + description + KONSULTASI WHATSAPP button (unchanged)
 * - Middle: other footer columns (Layanan, Menu)
 * - Right: Kontak column (WhatsApp above, Telp below) — rendered clearly
 */
export function SiteFooter() {
  // Split footerColumns into middle columns and the kontak column
  const middleColumns = footerColumns.filter((c) => c.title !== "Kontak");

  return (
    <footer className="relative overflow-hidden border-t border-[#1a4a37] bg-[linear-gradient(130deg,#001f14_0%,#002e1f_58%,#003526_100%)] text-white">
      <div className="pointer-events-none absolute -top-26 right-0 h-64 w-64 rounded-full bg-[radial-gradient(circle,rgba(245,196,0,0.22)_0%,rgba(245,196,0,0)_70%)]" />
      <div className="pointer-events-none absolute -bottom-28 -left-12 h-72 w-72 rounded-full bg-[radial-gradient(circle,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_68%)]" />

      <div className="site-container relative py-16 md:py-18">
        <div className="grid gap-10 border-b border-white/14 pb-10 md:grid-cols-[1.2fr_1fr_1fr] lg:grid-cols-[1.3fr_0.9fr_0.9fr_1.1fr]">
          {/* LEFT: Brand + Desc + CTA (KONSULTASI WHATSAPP) */}
          <div>
            <p className="inline-flex items-center rounded-full border border-[#f5c400]/55 bg-[#f5c400]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-[#f5c400]">
              {companyProfile.brandName}
            </p>
            <p className="mt-5 text-xl font-semibold tracking-tight text-white md:text-2xl">
              {companyProfile.companyName}
            </p>
            <p className="mt-4 max-w-sm text-sm leading-7 text-white/76">
              Mitra terpercaya untuk pengadaan, rental, maintenance, dan
              distribusi kebutuhan industri dengan pendekatan layanan yang
              profesional, efisien, dan berkelanjutan.
            </p>

            <div className="mt-6">
              <a
                href={companyProfile.whatsappLink}
                target="_blank"
                rel="noreferrer"
                className="inline-flex items-center rounded-xl border border-[#f5c400]/50 bg-[#f5c400] px-4 py-2.5 text-xs font-semibold uppercase tracking-[0.14em] text-[#002e1f] shadow-[0_12px_30px_rgba(245,196,0,0.3)] hover:translate-y-[-1px] hover:bg-[#ffd84e]">
                Konsultasi WhatsApp
              </a>
            </div>
          </div>

          {/* MIDDLE: other footer columns (Layanan, Menu) */}
          {middleColumns.map((column) => (
            <div key={column.title}>
              <p className="footer-title">{column.title}</p>
              <ul className="mt-4 space-y-2 text-sm leading-7 text-white/82">
                {column.items.map((item) => {
                  const match = navItems.find(
                    (navItem) => navItem.label === item,
                  );
                  return (
                    <li key={item}>
                      {column.title === "Menu" && match ? (
                        <Link
                          href={match.href}
                          className="hover:text-[#f5c400] hover:underline hover:underline-offset-4">
                          {item}
                        </Link>
                      ) : (
                        <span className="text-white/88">{item}</span>
                      )}
                    </li>
                  );
                })}
              </ul>
            </div>
          ))}

          {/* RIGHT: Kontak column (WhatsApp above Telp) */}
          <div>
            <p className="footer-title">Kontak</p>

            <div className="mt-4 text-sm leading-7 text-white/82">
              {/* WhatsApp (main) */}
              <div className="mb-4">
                <p className="text-xs uppercase tracking-[0.12em] text-white/70">
                  WhatsApp
                </p>
                <p className="mt-1 font-semibold text-white">
                  {companyProfile.whatsapp.replace(" (Titis)", "")}
                </p>
              </div>

              {/* Telepon (secondary) */}
              <div className="mb-3">
                <p className="text-xs uppercase tracking-[0.12em] text-white/70">
                  Telp
                </p>
                <p className="mt-1 font-semibold text-white">
                  {companyProfile.phone}
                </p>
              </div>

              {/* Email & alamat & website (supporting details) */}
              <div className="mt-4 text-sm text-white/82">
                <p className="text-xs uppercase tracking-[0.12em] text-white/70">
                  Email
                </p>
                <p className="mt-1">{companyProfile.email}</p>

                <p className="mt-3 text-xs uppercase tracking-[0.12em] text-white/70">
                  Alamat
                </p>
                <p className="mt-1">{companyProfile.address}</p>

                <p className="mt-3 text-xs uppercase tracking-[0.12em] text-white/70">
                  Website
                </p>
                <p className="mt-1">{companyProfile.website}</p>
              </div>
            </div>
          </div>
        </div>

        <p className="mt-8 text-[10px] uppercase tracking-[0.14em] text-white/52 md:mt-10">
          {footerNote}
        </p>
      </div>
    </footer>
  );
}
