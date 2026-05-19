export const categoryPageContent = {
  title: "Everything Your Industry Needs.",
  subtitle:
    "Eksplor katalog lengkap Air Freshener Otomatis, produk hygiene, dan kemasan industri yang dirancang untuk reliabilitas jangka panjang.",
  categoryLabel: "Category Selection",
  allLabel: "SEMUA",
} as const;

export const categorySubMap = {
  Triscent: [
    "Perfume Dispenser",
    "Hygiene Sanitary",
    "Toilet Sanitary",
  ],
  Packaging: ["Lakban", "Wrapping Film", "Bubble Wrap"],
} as const;

export type CategoryType = keyof typeof categorySubMap;
