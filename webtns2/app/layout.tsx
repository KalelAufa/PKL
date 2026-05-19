import type { Metadata } from "next";
import { Plus_Jakarta_Sans } from "next/font/google";
import { SiteLayout } from "@/app/components/SiteLayout";
import "./globals.css";

const jakartaSans = Plus_Jakarta_Sans({
  variable: "--font-brand",
  subsets: ["latin"],
});

export const metadata: Metadata = {
  metadataBase: new URL("https://www.triciptaniagasukses.my.id"),
  title: {
    default: "Triscent - PT Tricipta Niaga Sukses",
    template: "%s | Triscent",
  },
  description:
    "Smart scents for modern spaces. Solusi terbaik untuk udara bersih, lingkungan nyaman, dan kemasan industri dari PT Tricipta Niaga Sukses.",
  keywords: [
    "Triscent",
    "PT Tricipta Niaga Sukses",
    "perfume dispenser",
    "hygiene sanitary",
    "solusi kemasan",
  ],
  alternates: {
    canonical: "/",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="id" className={`${jakartaSans.variable} h-full`}>
      <body className="min-h-full bg-background text-foreground antialiased">
        <div className="flex min-h-full flex-col">
          <SiteLayout>{children}</SiteLayout>
        </div>
      </body>
    </html>
  );
}
