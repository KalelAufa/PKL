import type { ReactNode } from "react";
import { SiteFooter } from "@/app/components/SiteFooter";
import { SiteHeader } from "@/app/components/SiteHeader";
import { WhatsAppFloat } from "@/app/components/WhatsAppFloat";

/**
 * Global shell for the Triscent website.
 */
export function SiteLayout({ children }: { children: ReactNode }) {
  return (
    <>
      <SiteHeader />
      <main className="flex-1">{children}</main>
      <SiteFooter />
      <WhatsAppFloat />
    </>
  );
}
