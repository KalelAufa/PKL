"use client";

import type { ReactNode } from "react";
import { useEffect, useRef, useState } from "react";

/**
 * Light reveal animation utility for section content.
 */
export function Reveal({
  children,
  delay = 0,
  className = "",
  distance = 16,
}: {
  children: ReactNode;
  delay?: number;
  className?: string;
  distance?: number;
}) {
  const [isVisible, setIsVisible] = useState(true);
  const ref = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const node = ref.current;
    if (!node || typeof IntersectionObserver === "undefined") {
      return;
    }

    // Start hidden only when observer is available, then reveal on intersection.
    setIsVisible(false);

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setIsVisible(true);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.2 },
    );

    observer.observe(node);
    return () => observer.disconnect();
  }, []);

  return (
    <div
      ref={ref}
      style={{
        transitionDelay: `${delay}ms`,
        transform: isVisible ? "translateY(0)" : `translateY(${distance}px)`,
      }}
      className={`transition-all duration-700 will-change-transform ${
        isVisible ? "opacity-100" : "opacity-0"
      } ${className}`}>
      {children}
    </div>
  );
}
