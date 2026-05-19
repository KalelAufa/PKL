import { companyProfile } from "@/app/data/company";

export const contactPageContent = {
  title: "Hubungi Tim Kami",
  subtitle:
    "Siap untuk mengintegrasikan keunggulan industrial ke dalam proyek Anda. Hubungi spesialis kami untuk konsultasi teknis dan solusi yang presisi.",
} as const;

export const contactFormCopy = {
  fullNameLabel: "Nama Lengkap",
  fullNamePlaceholder: "John Doe",
  emailLabel: "Email Perusahaan",
  emailPlaceholder: "email@company.com",
  needLabel: "Kategori Kebutuhan",
  messageLabel: "Detail Pesan",
  messagePlaceholder:
    "Deskripsikan kebutuhan industrial Anda secara spesifik...",
  submitLabel: "Kirim Pesan",
} as const;

/**
 * contactCards: Email | (WhatsApp on top, Telepon below) | Address
 */
export const contactCards = [
  { title: "Email", value: companyProfile.email },
  {
    title: "Kontak",
    value: `${companyProfile.whatsapp.replace(" (Titis)", "")}\n${companyProfile.phone}`,
  },
  {
    title: "Address",
    value: `${companyProfile.address}, Indonesia`,
  },
] as const;

export const contactNeedOptions = [
  "Air Freshener & Hygine",
  "Packaging",
] as const;
