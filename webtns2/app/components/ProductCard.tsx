"use client";

import Image from "next/image";
import Link from "next/link";

type ProductCardProps = {
  id: number;
  name: string;
  description: string;
  image: string;
  showPremiumTag?: boolean;
};

/**
 * Reusable card for product listings and related products.
 */
export function ProductCard({
  id,
  name,
  description,
  image,
  showPremiumTag = false,
}: ProductCardProps) {
  return (
    <article className="group flex h-full min-h-100.5 flex-col rounded-[14px] border border-[rgba(193,201,188,0.35)] bg-white p-3 shadow-[0_2px_10px_rgba(0,0,0,0.03)] transition-shadow hover:shadow-[0_12px_30px_rgba(15,63,20,0.12)]">
      <div className="relative overflow-hidden rounded-sm bg-(--color-surface-soft)">
        <Image
          src={image}
          alt={name}
          width={800}
          height={600}
          className="h-52 w-full object-contain object-center p-2 transition-transform duration-500 group-hover:scale-[1.02]"
        />

        {showPremiumTag ? (
          <span className="absolute right-3 top-3 rounded-sm bg-(--color-accent-bright) px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-[#221b00]">
            Premium
          </span>
        ) : null}
      </div>

      <h3 className="mt-4 text-[22px] font-medium tracking-tight text-(--color-primary)">
        {name}
      </h3>
      <p className="mt-2 line-clamp-2 text-sm leading-6 text-(--color-muted)">
        {description}
      </p>

      <div className="mt-auto flex items-center gap-3 pt-5">
        <Link href={`/produk/${id}`} className="primary-btn flex-1 text-center">
          Lihat Detail
        </Link>
      </div>
    </article>
  );
}
