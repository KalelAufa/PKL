import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ProductCard } from "@/app/components/ProductCard";
import { ProductImageGallery } from "@/app/components/ProductImageGallery";
import { Reveal } from "@/app/components/Reveal";
import {
  categoryProducts,
  companyProfile,
  productDetailFallbackSpecs,
  productDetailPageContent,
} from "@/app/data/site-content";

type ProductDetailPageProps = {
  params: Promise<{ id: string }>;
};

export async function generateStaticParams() {
  return categoryProducts.map((product) => ({ id: String(product.id) }));
}

export async function generateMetadata({
  params,
}: ProductDetailPageProps): Promise<Metadata> {
  const { id } = await params;
  const product = categoryProducts.find((item) => item.id === Number(id));

  return {
    title: product ? `${product.name} - Detail Produk` : "Detail Produk",
    description: product?.description ?? "Detail produk Triscent.",
  };
}

export default async function ProductDetailPage({
  params,
}: ProductDetailPageProps) {
  const { id } = await params;
  const product = categoryProducts.find((item) => item.id === Number(id));

  if (!product) {
    notFound();
  }

  const specs = product.specifications ?? productDetailFallbackSpecs;

  const relatedProducts = categoryProducts
    .filter(
      (item) => item.category === product.category && item.id !== product.id,
    )
    .slice(0, 4);

  return (
    <section className="site-container py-10 md:py-14">
      <Reveal>
        <nav className="text-[11px] font-semibold uppercase tracking-[0.13em] text-(--color-muted)">
          Beranda / Kategori /{" "}
          <span className="text-(--color-primary)">{product.name}</span>
        </nav>
      </Reveal>

      <Reveal delay={70}>
        <div className="mt-6 grid gap-8 lg:grid-cols-[1.25fr_1fr]">
          <ProductImageGallery
            name={product.name}
            images={
              product.images?.length
                ? product.images
                : [product.image ?? "/images/product-placeholder.jpg"]
            }
          />

          <div>
            <span className="inline-flex rounded-sm bg-(--color-accent-bright) px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-[#221b00]">
              {productDetailPageContent.grade}
            </span>

            <h1 className="mt-4 text-4xl font-medium uppercase leading-[1.02] tracking-[-0.03em] text-(--color-primary) md:text-6xl">
              {product.name}
            </h1>

            <p className="mt-4 text-base leading-7 text-(--color-muted)">
              {product.description}
            </p>

            <div className="mt-8 border-t border-(--color-border-soft) pt-6">
              <h2 className="text-sm font-semibold uppercase tracking-[0.14em] text-(--color-accent)">
                {productDetailPageContent.specificationTitle}
              </h2>

              <div className="mt-4 grid gap-3 sm:grid-cols-2">
                {specs.map((spec, index) => (
                  <Reveal key={spec.label} delay={index * 65}>
                    <article className="rounded-sm bg-(--color-surface-soft) p-4">
                      <p className="text-[10px] uppercase tracking-[0.12em] text-(--color-muted)">
                        {spec.label}
                      </p>
                      <p className="mt-1 text-sm font-semibold text-foreground">
                        {spec.value}
                      </p>
                    </article>
                  </Reveal>
                ))}
              </div>
            </div>

            {
              // build prefilled WhatsApp message including product name
            }
            <a
              href={`${companyProfile.whatsappLink}?text=${encodeURIComponent(
                `Halo Tim PT Tricipta Niaga Sukses,\nSaya tertarik dengan produk: ${product.name}\nMohon informasi lebih detail mengenai:\n• Harga terbaru\n• Spesifikasi lengkap\n• Ketersediaan stok\n• Estimasi pengiriman ke: [Kota/Alamat]\n\nNama: [Nama Anda]\nKontak: [No. HP / Email]\n\nTerima kasih atas bantuannya.`,
              )}`}
              target="_blank"
              rel="noreferrer"
              className="primary-btn mt-8 flex items-center justify-center">
              {productDetailPageContent.cta}
            </a>
          </div>
        </div>
      </Reveal>

      <Reveal delay={120}>
        <div className="mt-16">
          <div className="flex items-center justify-between gap-4">
            <h2 className="text-3xl font-semibold uppercase tracking-[-0.03em] text-(--color-primary)">
              {productDetailPageContent.relatedTitle}
            </h2>
            <Link
              href="/kategori"
              className="text-xs font-semibold uppercase tracking-[0.13em] text-(--color-accent)">
              {productDetailPageContent.allCategoryLabel}
            </Link>
          </div>

          <div className="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {relatedProducts.map((related, index) => (
              <Reveal key={related.id} delay={index * 70}>
                <ProductCard
                  id={related.id}
                  name={related.name}
                  description={related.description}
                  image={related.image ?? "/images/product-placeholder.jpg"}
                />
              </Reveal>
            ))}
          </div>
        </div>
      </Reveal>
    </section>
  );
}
