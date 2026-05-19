import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { HeroCarousel } from "@/app/components/HeroCarousel";
import { Reveal } from "@/app/components/Reveal";
import {
  featuredProductsCarousel,
  heroCarouselImages,
  homePageContent,
  homeSolutionCards,
  whyChooseItems,
} from "@/app/data/site-content";

const whyChooseIcons = [
  <svg
    key="shield"
    viewBox="0 0 24 24"
    className="h-5 w-5"
    fill="none"
    aria-hidden="true">
    <path
      d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z"
      stroke="currentColor"
      strokeWidth="1.7"
    />
    <path
      d="M9 12l2 2 4-4"
      stroke="currentColor"
      strokeWidth="1.7"
      strokeLinecap="round"
      strokeLinejoin="round"
    />
  </svg>,
  <svg
    key="clipboard"
    viewBox="0 0 24 24"
    className="h-5 w-5"
    fill="none"
    aria-hidden="true">
    <path
      d="M7 4h10l2 3v10a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7l2-3z"
      stroke="currentColor"
      strokeWidth="1.7"
    />
    <path
      d="M9 10h6M9 14h4"
      stroke="currentColor"
      strokeWidth="1.7"
      strokeLinecap="round"
    />
  </svg>,
  <svg
    key="document"
    viewBox="0 0 24 24"
    className="h-5 w-5"
    fill="none"
    aria-hidden="true">
    <path
      d="M4 14V8a2 2 0 0 1 2-2h8l6 6v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"
      stroke="currentColor"
      strokeWidth="1.7"
    />
    <path d="M14 6v6h6" stroke="currentColor" strokeWidth="1.7" />
  </svg>,
  <svg
    key="clock"
    viewBox="0 0 24 24"
    className="h-5 w-5"
    fill="none"
    aria-hidden="true">
    <circle cx="12" cy="12" r="8" stroke="currentColor" strokeWidth="1.7" />
    <path
      d="M12 8v4l3 2"
      stroke="currentColor"
      strokeWidth="1.7"
      strokeLinecap="round"
      strokeLinejoin="round"
    />
  </svg>,
] as const;

export const metadata: Metadata = {
  title: "Beranda",
  description:
    "Solusi terbaik untuk udara bersih, lingkungan nyaman, dan kemasan industri dari PT Tricipta Niaga Sukses.",
};

export default function HomePage() {
  const featuredProductsLoop = [
    ...featuredProductsCarousel,
    ...featuredProductsCarousel,
  ];

  return (
    <>
      <Reveal>
        <section className="relative overflow-hidden bg-[linear-gradient(170deg,#f8f7f2_0%,#f9f9f6_44%,#f7f5ec_100%)] py-14 md:py-22">
          <div className="pointer-events-none absolute -top-28 right-[3%] h-64 w-64 rounded-full bg-[radial-gradient(circle,rgba(241,196,15,0.2)_0%,rgba(241,196,15,0)_72%)]" />
          <div className="pointer-events-none absolute -left-14 top-8 h-56 w-56 rounded-full bg-[radial-gradient(circle,rgba(0,46,31,0.1)_0%,rgba(0,46,31,0)_72%)]" />

          <div className="site-container relative grid gap-12 lg:grid-cols-[1fr_0.86fr] lg:items-center">
            <div>
              <p className="inline-flex items-center rounded-full border border-(--color-border) bg-white/80 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-(--color-primary)">
                PT Tricipta Niaga Sukses
              </p>
              <p className="section-line mt-6" />
              <h1 className="section-title-xl mt-6 max-w-3xl text-balance font-semibold text-(--color-primary)">
                {homePageContent.title}
              </h1>

              <p className="mt-7 max-w-2xl text-base leading-8 text-(--color-muted) md:text-lg">
                {homePageContent.subtitle}
              </p>

              <div className="mt-6 flex flex-wrap gap-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-(--color-primary)">
                <span className="rounded-full border border-(--color-border) bg-white px-3 py-1.5">
                  General Trading
                </span>
                <span className="rounded-full border border-(--color-border) bg-white px-3 py-1.5">
                  Rental System
                </span>
                <span className="rounded-full border border-(--color-border) bg-white px-3 py-1.5">
                  Maintenance
                </span>
              </div>

              <div className="mt-7 flex flex-wrap gap-3">
                <Link href="/kategori" className="primary-btn">
                  {homePageContent.ctaPrimary}
                </Link>
                <Link href="/hubungi-kami" className="ghost-btn">
                  {homePageContent.ctaSecondary}
                </Link>
              </div>
            </div>

            <div className="relative">
              <div className="pointer-events-none absolute inset-0 -z-10 rounded-[26px] bg-[radial-gradient(circle_at_80%_20%,rgba(241,196,15,0.28)_0%,rgba(241,196,15,0)_60%)]" />
              <HeroCarousel images={heroCarouselImages} />
            </div>
          </div>
        </section>
      </Reveal>

      <Reveal>
        <section className="bg-(--color-surface-soft) py-12 md:py-20">
          <div className="site-container">
            <p className="section-line" />
            <h2 className="mt-4 text-4xl font-semibold tracking-[-0.03em] text-foreground md:text-6xl">
              {homePageContent.productTitle}
            </h2>

            <div className="mt-10 hidden items-center justify-between gap-4 lg:flex">
              <p className="text-xs font-semibold uppercase tracking-[0.14em] text-(--color-muted)">
                {homePageContent.productHint}
              </p>
            </div>

            <div className="mt-4 grid gap-8 md:grid-cols-2 lg:flex lg:snap-x lg:snap-mandatory lg:gap-6 lg:overflow-x-auto lg:pb-4 lg:pr-2">
              {homeSolutionCards.map((card, index) => (
                <Reveal
                  key={card.title}
                  delay={index * 100}
                  className="h-full lg:w-115 lg:shrink-0 lg:snap-start">
                  <article className="group flex h-full min-h-80 flex-col rounded-[20px] border border-(--color-border-soft) bg-white p-8 shadow-[0_10px_30px_rgba(0,31,20,0.06)] md:p-10">
                    <h3 className="min-h-22 text-3xl leading-tight font-medium tracking-[-0.03em] text-(--color-primary)">
                      {card.title}
                    </h3>
                    <p className="mt-4 max-w-xl text-base leading-7 text-(--color-muted)">
                      {card.body}
                    </p>
                    <Link
                      href={card.href}
                      className="mt-auto inline-block pt-7 text-xs font-semibold uppercase tracking-[0.14em] text-(--color-primary) group-hover:text-(--color-accent)">
                      Jelajahi Katalog &rarr;
                    </Link>
                  </article>
                </Reveal>
              ))}
            </div>
          </div>
        </section>
      </Reveal>

      <Reveal>
        <section className="site-container py-12 md:py-16">
          <div className="flex items-end justify-between gap-4">
            <div>
              <p className="section-line" />
              <h2 className="mt-4 text-3xl font-semibold tracking-[-0.03em] text-(--color-primary) md:text-5xl">
                Produk Unggulan Kami
              </h2>
            </div>
            <p className="hidden text-xs font-semibold uppercase tracking-[0.14em] text-(--color-muted) md:block">
              Koleksi terpilih dari katalog Triscent
            </p>
          </div>

          <div className="relative mt-8 overflow-x-auto rounded-[22px] border border-(--color-border-soft) bg-white p-4 shadow-[0_14px_35px_rgba(0,31,20,0.06)] md:overflow-hidden md:p-6 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <div className="pointer-events-none absolute inset-y-0 left-0 z-10 w-10 bg-gradient-to-r from-(--color-surface) to-transparent md:w-20" />
            <div className="pointer-events-none absolute inset-y-0 right-0 z-10 w-10 bg-gradient-to-l from-(--color-surface) to-transparent md:w-20" />

            <div className="flex w-max gap-4 py-1 md:gap-6 md:py-2 motion-safe:animate-[featured-marquee_36s_linear_infinite] hover:[animation-play-state:paused]">
              {featuredProductsLoop.map((product, index) => (
                <article
                  key={`${product.id}-${index}`}
                  className="group relative w-56 shrink-0 overflow-hidden rounded-2xl border border-(--color-border-soft) bg-white shadow-[0_8px_22px_rgba(0,31,20,0.08)] md:w-72">
                  <div className="relative aspect-[4/3] w-full">
                    <Image
                      src={product.image}
                      alt={product.name}
                      fill
                      sizes="(max-width: 768px) 224px, 288px"
                      className="object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    <div className="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent px-4 py-3">
                      <p className="text-sm font-medium tracking-[-0.01em] text-white md:text-base">
                        {product.name}
                      </p>
                    </div>
                  </div>
                </article>
              ))}
            </div>
          </div>
        </section>
      </Reveal>

      <Reveal>
        <section className="site-container py-14 md:py-20">
          <div className="grid gap-8 md:grid-cols-[0.9fr_1fr] md:items-end">
            <h2 className="text-4xl font-semibold leading-[1.04] tracking-[-0.03em] text-foreground md:text-6xl">
              {homePageContent.whyTitle}
            </h2>

            <p className="text-base leading-8 text-(--color-muted)">
              {homePageContent.whyBody}
            </p>
          </div>

          <div className="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            {whyChooseItems.map((item, index) => (
              <Reveal key={item.title} delay={index * 80}>
                <article className="rounded-2xl border border-(--color-border-soft) bg-white p-6 shadow-[0_10px_28px_rgba(0,31,20,0.05)]">
                  <div className="mb-5 flex h-12 w-12 items-center justify-center rounded bg-[rgba(241,196,15,0.16)] text-(--color-primary)">
                    {whyChooseIcons[index % whyChooseIcons.length]}
                  </div>
                  <h3 className="text-sm font-semibold tracking-[0.01em] text-foreground">
                    {item.title}
                  </h3>
                  <p className="mt-3 text-sm leading-6 text-(--color-muted)">
                    {item.body}
                  </p>
                </article>
              </Reveal>
            ))}
          </div>
        </section>
      </Reveal>

      <Reveal>
        <section className="bg-(--color-surface-soft) py-16 md:py-20">
          <div className="site-container rounded-[26px] border border-(--color-border-soft) bg-[linear-gradient(150deg,rgba(255,255,255,0.96)_0%,rgba(255,249,220,0.54)_100%)] px-6 py-14 text-center shadow-[0_18px_44px_rgba(0,31,20,0.08)] md:px-10 md:py-16">
            <p className="section-line mx-auto" />
            <h2 className="mt-4 text-4xl font-semibold tracking-[-0.03em] text-(--color-primary) md:text-6xl">
              {homePageContent.contactTitle}
            </h2>
            <p className="mx-auto mt-4 max-w-3xl text-base leading-8 text-(--color-muted)">
              {homePageContent.contactBody}
            </p>
            <Link href="/hubungi-kami" className="primary-btn mt-8 inline-flex">
              {homePageContent.contactCta}
            </Link>
          </div>
        </section>
      </Reveal>

      <style>{`
        @keyframes featured-marquee {
          0% {
            transform: translateX(0);
          }
          100% {
            transform: translateX(-50%);
          }
        }
      `}</style>
    </>
  );
}
