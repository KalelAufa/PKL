import type { Metadata } from "next";
import { Suspense } from "react";
import { CategoryCatalog } from "@/app/components/CategoryCatalog";

export const metadata: Metadata = {
  title: "Kategori Produk",
  description:
    "Katalog Air Freshener Otomatis, produk hygiene, dan kemasan industri PT Tricipta Niaga Sukses.",
};

export default function CategoryPage() {
  return (
    <Suspense fallback={<section className="site-container py-12 md:py-16" />}>
      <CategoryCatalog />
    </Suspense>
  );
}
