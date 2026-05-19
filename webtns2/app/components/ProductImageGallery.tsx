"use client";

import Image from "next/image";
import { useMemo, useState } from "react";

type ProductImageGalleryProps = {
  name: string;
  images: string[];
};

/**
 * Marketplace-like image gallery for product detail pages.
 */
export function ProductImageGallery({
  name,
  images,
}: ProductImageGalleryProps) {
  const safeImages = useMemo(() => {
    if (images.length > 0) {
      return images;
    }

    return ["/images/product-placeholder.jpg"];
  }, [images]);

  const [activeIndex, setActiveIndex] = useState(0);

  return (
    <div>
      <div className="relative aspect-4/3 w-full overflow-hidden rounded-md bg-(--color-surface-soft)">
        {safeImages.map((src, index) => (
          <Image
            key={`${src}-${index}`}
            src={src}
            alt={`${name} image ${index + 1}`}
            width={800}
            height={600}
            className={`absolute inset-0 h-full w-full object-contain object-center p-4 transition-opacity duration-300 ${
              activeIndex === index
                ? "opacity-100"
                : "pointer-events-none opacity-0"
            }`}
            priority={index === 0}
          />
        ))}
      </div>

      <div className="mt-4 overflow-x-auto pb-1">
        <div className="flex min-w-full justify-center">
          <div className="flex w-max gap-3 px-2">
            {safeImages.map((src, index) => {
              const isActive = activeIndex === index;

              return (
                <button
                  key={`thumb-${src}-${index}`}
                  type="button"
                  onClick={() => setActiveIndex(index)}
                  className={`overflow-hidden rounded-md border-2 transition-colors ${
                    isActive
                      ? "border-[#0F3F14]"
                      : "border-[rgba(15,63,20,0.18)] hover:border-[rgba(15,63,20,0.45)]"
                  }`}
                  aria-label={`Pilih foto ${index + 1}`}>
                  <Image
                    src={src}
                    alt={`${name} thumbnail ${index + 1}`}
                    width={200}
                    height={150}
                    className="h-15 w-20 object-cover"
                  />
                </button>
              );
            })}
          </div>
        </div>
      </div>
    </div>
  );
}
