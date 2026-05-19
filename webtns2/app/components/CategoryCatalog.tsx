"use client";

import { useEffect, useMemo, useRef, useState } from "react";
import { useSearchParams } from "next/navigation";
import {
  categoryPageContent,
  categoryProducts,
  categorySubMap,
  type CategoryType,
} from "@/app/data/site-content";
import { ProductCard } from "@/app/components/ProductCard";
import { Reveal } from "@/app/components/Reveal";

const ALL_SUBCATEGORY = categoryPageContent.allLabel;

/**
 * Interactive product catalog with category and subcategory controls.
 */
export function CategoryCatalog() {
  const PRODUCTS_PER_PAGE = 4;
  const searchParams = useSearchParams();

  const categoryFromQuery = useMemo<CategoryType>(() => {
    const categoryFromUrl = searchParams.get("category");

    if (
      categoryFromUrl &&
      (Object.keys(categorySubMap) as CategoryType[]).includes(
        categoryFromUrl as CategoryType,
      )
    ) {
      return categoryFromUrl as CategoryType;
    }

    return "Triscent";
  }, [searchParams]);

  const [activeCategory, setActiveCategory] =
    useState<CategoryType>(categoryFromQuery);
  const [activeSubcategory, setActiveSubcategory] =
    useState<string>(ALL_SUBCATEGORY);
  const [currentPage, setCurrentPage] = useState<number>(1);
  const previousCategoryFromQuery = useRef<CategoryType>(categoryFromQuery);

  const subcategories = categorySubMap[activeCategory];

  const filteredProducts = useMemo(() => {
    return categoryProducts.filter(
      (product) =>
        product.category === activeCategory &&
        (activeSubcategory === ALL_SUBCATEGORY ||
          product.subcategory === activeSubcategory),
    );
  }, [activeCategory, activeSubcategory]);

  const totalPages = Math.max(
    1,
    Math.ceil(filteredProducts.length / PRODUCTS_PER_PAGE),
  );

  const paginatedProducts = useMemo(() => {
    const startIndex = (currentPage - 1) * PRODUCTS_PER_PAGE;
    return filteredProducts.slice(startIndex, startIndex + PRODUCTS_PER_PAGE);
  }, [currentPage, filteredProducts]);

  useEffect(() => {
    if (previousCategoryFromQuery.current === categoryFromQuery) {
      return;
    }

    previousCategoryFromQuery.current = categoryFromQuery;
    setActiveCategory(categoryFromQuery);
    setActiveSubcategory(ALL_SUBCATEGORY);
    setCurrentPage(1);
  }, [activeCategory, categoryFromQuery]);

  const selectCategory = (category: CategoryType) => {
    setActiveCategory(category);
    setActiveSubcategory(ALL_SUBCATEGORY);
    setCurrentPage(1);
  };

  const selectSubcategory = (subcategory: string) => {
    setActiveSubcategory(subcategory);
    setCurrentPage(1);
  };

  const goToPage = (page: number) => {
    if (page < 1 || page > totalPages) {
      return;
    }

    setCurrentPage(page);
  };

  return (
    <>
      <section className="site-container py-12 md:py-16">
        <Reveal>
          <div className="grid gap-8 border-b border-(--color-border-soft) pb-7 md:grid-cols-[1fr_auto] md:items-end">
            <div>
              <p className="section-line" />
              <h1 className="section-title-xl mt-4 max-w-xl text-balance font-medium text-(--color-primary)">
                {categoryPageContent.title}
              </h1>
            </div>

            <p className="max-w-md border-l-2 border-(--color-border) pl-6 text-[15px] leading-7 text-(--color-muted)">
              {categoryPageContent.subtitle}
            </p>
          </div>
        </Reveal>

        <Reveal delay={80}>
          <div className="mt-8 border-b border-(--color-border-soft) pb-6">
            <div className="flex flex-wrap items-center gap-4">
              <p className="text-xs font-semibold uppercase tracking-[0.16em] text-foreground">
                {categoryPageContent.categoryLabel}
              </p>
              <div className="flex gap-3">
                {(Object.keys(categorySubMap) as CategoryType[]).map(
                  (category) => (
                    <button
                      key={category}
                      type="button"
                      className={
                        activeCategory === category
                          ? "tab-btn-active"
                          : "tab-btn"
                      }
                      onClick={() => selectCategory(category)}>
                      {category}
                    </button>
                  ),
                )}
              </div>
            </div>
          </div>
        </Reveal>

        <Reveal delay={140}>
          <div className="mt-6 overflow-x-auto rounded bg-(--color-surface-soft) p-2">
            <div className="flex min-w-max gap-1">
              <button
                type="button"
                className={`${
                  activeSubcategory === ALL_SUBCATEGORY
                    ? "segment-active"
                    : "segment-btn"
                } shrink-0`}
                onClick={() => selectSubcategory(ALL_SUBCATEGORY)}>
                {ALL_SUBCATEGORY}
              </button>

              {subcategories.map((subcategory) => (
                <button
                  key={subcategory}
                  type="button"
                  className={`${
                    activeSubcategory === subcategory
                      ? "segment-active"
                      : "segment-btn"
                  } shrink-0`}
                  onClick={() => selectSubcategory(subcategory)}>
                  {subcategory}
                </button>
              ))}
            </div>
          </div>
        </Reveal>

        <div className="mt-8 grid gap-4 sm:grid-cols-2 lg:mt-10 lg:gap-6 lg:grid-cols-4">
          {paginatedProducts.map((product, index) => (
            <Reveal key={product.id} delay={index * 70}>
              <ProductCard
                id={product.id}
                name={product.name}
                description={product.description}
                image={product.image ?? "/images/product-placeholder.jpg"}
                showPremiumTag={activeCategory === "Triscent"}
              />
            </Reveal>
          ))}
        </div>

        {filteredProducts.length > PRODUCTS_PER_PAGE ? (
          <Reveal delay={90}>
            <div className="mt-8 overflow-x-auto pb-1">
              <div className="mx-auto flex w-max min-w-full items-center justify-center gap-2 px-2">
                <button
                  type="button"
                  className="flex h-14 w-14 items-center justify-center rounded-2xl border-2 border-(--color-primary) bg-white text-lg text-(--color-primary) hover:bg-(--color-surface-soft) disabled:cursor-not-allowed disabled:border-(--color-border) disabled:text-(--color-muted)/70"
                  onClick={() => goToPage(currentPage - 1)}
                  disabled={currentPage === 1}
                  aria-label="Halaman sebelumnya">
                  &larr;
                </button>

                {Array.from(
                  { length: totalPages },
                  (_, index) => index + 1,
                ).map((pageNumber) => (
                  <button
                    key={pageNumber}
                    type="button"
                    className={`flex h-14 min-w-14 items-center justify-center rounded-2xl px-4 text-lg font-medium ${
                      currentPage === pageNumber
                        ? "bg-(--color-primary) text-white"
                        : "bg-(--color-surface-soft) text-foreground hover:bg-[#ddddda]"
                    }`}
                    onClick={() => goToPage(pageNumber)}>
                    {pageNumber}
                  </button>
                ))}

                <button
                  type="button"
                  className="flex h-14 w-14 items-center justify-center rounded-2xl border-2 border-(--color-primary) bg-white text-lg text-(--color-primary) hover:bg-(--color-surface-soft) disabled:cursor-not-allowed disabled:border-(--color-border) disabled:text-(--color-muted)/70"
                  onClick={() => goToPage(currentPage + 1)}
                  disabled={currentPage === totalPages}
                  aria-label="Halaman berikutnya">
                  &rarr;
                </button>
              </div>
            </div>
          </Reveal>
        ) : null}
      </section>
    </>
  );
}
