"use client";

import Image from "next/image";
import { useEffect, useState } from "react";

export type HeroSlide = {
  src: string;
  alt: string;
};

type HeroCarouselProps = {
  images: readonly HeroSlide[];
};

/**
 * Auto-rotating hero carousel used on the homepage.
 */
export function HeroCarousel({ images }: HeroCarouselProps) {
  const [activeIndex, setActiveIndex] = useState(0);

  useEffect(() => {
    const intervalId = setInterval(() => {
      setActiveIndex((current) => (current + 1) % images.length);
    }, 3500);

    return () => clearInterval(intervalId);
  }, [images.length]);

  return (
    <div className="relative h-[320px] overflow-hidden rounded-[22px] bg-[var(--color-surface-soft)] sm:h-[520px]">
      {images.map((image, index) => (
        <div
          key={image.src}
          className={`absolute inset-0 transition-opacity duration-700 ${
            activeIndex === index ? "opacity-100" : "opacity-0"
          }`}>
          <Image
            src={image.src}
            alt={image.alt}
            fill
            priority={index === 0}
            className="object-cover"
            sizes="(max-width: 768px) 100vw, 50vw"
          />
        </div>
      ))}

      <div className="absolute inset-x-4 bottom-4 flex gap-2">
        {images.map((image, index) => (
          <button
            key={image.alt}
            type="button"
            className={`h-2.5 rounded-full transition-all ${
              index === activeIndex
                ? "w-8 bg-[var(--color-accent-bright)]"
                : "w-2.5 bg-white/70"
            }`}
            onClick={() => setActiveIndex(index)}
            aria-label={`Show slide ${index + 1}`}
          />
        ))}
      </div>
    </div>
  );
}
