import { companyProfile } from "@/app/data/company";
import { navItems } from "@/app/data/navigation";

const footerMenuItems = navItems.map((item) => item.label);

export const footerColumns = [
  {
    title: "Layanan",
    items: [
      "General Trading",
      "Sistem Rental",
      "Maintenance Peralatan",
      "Industrial Supply",
    ],
  },
  {
    title: "Menu",
    items: footerMenuItems,
  },
  {
    // Kontak column: WhatsApp (utama) then Telepon (kedua)
    title: "Kontak",
    // show WhatsApp then Telp then email/address/website
    items: [
      companyProfile.whatsapp.replace(" (Titis)", ""),
      companyProfile.phone,
      companyProfile.email,
      companyProfile.address,
      companyProfile.website,
    ],
  },
] as const;

export const footerNote =
  "2026 PT Tricipta Niaga Sukses. Solusi perdagangan umum dan rental untuk pertumbuhan bisnis berkelanjutan.";
