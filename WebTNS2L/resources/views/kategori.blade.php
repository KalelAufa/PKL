@extends('layouts.app')
@section('title', 'Kategori Produk')

@section('content')
    <section class="site-container py-12 md:py-16">
      <div data-reveal class="transition-all duration-700 will-change-transform">
        <div class="grid gap-8 border-b border-(--color-border-soft) pb-7 md:grid-cols-[1fr_auto] md:items-end">
          <div>
            <p class="section-line"></p>
            <h1 class="section-title-xl mt-4 max-w-xl text-balance font-medium text-(--color-primary)">
              {{ $categoryPageContent['title'] }}
            </h1>
          </div>

          <p class="max-w-md border-l-2 border-(--color-border) pl-6 text-[15px] leading-7 text-(--color-muted)">
            {{ $categoryPageContent['subtitle'] }}
          </p>
        </div>
      </div>

      <div data-reveal data-delay="80" class="transition-all duration-700 will-change-transform">
        <div class="mt-8 border-b border-(--color-border-soft) pb-6">
          <div class="flex flex-wrap items-center gap-4">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-foreground">
              {{ $categoryPageContent['categoryLabel'] }}
            </p>
            <div class="flex gap-3" data-category-tabs>
              @foreach (array_keys($categorySubMap) as $category)
                <button
                  type="button"
                  class="{{ $activeCategory === $category ? 'tab-btn-active' : 'tab-btn' }}"
                  data-category="{{ $category }}">
                  {{ $category }}
                </button>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div data-reveal data-delay="140" class="transition-all duration-700 will-change-transform">
        <div class="mt-6 overflow-x-auto rounded bg-(--color-surface-soft) p-2">
          <div class="flex min-w-max gap-1" data-subcategory-tabs>
            <button type="button" class="segment-active shrink-0" data-subcategory="{{ $categoryPageContent['allLabel'] }}">
              {{ $categoryPageContent['allLabel'] }}
            </button>
          </div>
        </div>
      </div>

      <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:mt-10 lg:gap-6 lg:grid-cols-4" data-product-grid></div>

      <div data-reveal data-delay="90" class="transition-all duration-700 will-change-transform" data-pagination-wrapper>
        <div class="mt-8 overflow-x-auto pb-1">
          <div class="mx-auto flex w-max min-w-full items-center justify-center gap-2 px-2" data-pagination></div>
        </div>
      </div>
    </section>

    <script>
      const categoryProducts = @json($categoryProducts);
      const categorySubMap = @json($categorySubMap);
      const allLabel = @json($categoryPageContent['allLabel']);
      let activeCategory = @json($activeCategory);
      let activeSubcategory = allLabel;
      let currentPage = 1;
      const PRODUCTS_PER_PAGE = 4;

      const categoryTabs = document.querySelector("[data-category-tabs]");
      const subcategoryTabs = document.querySelector("[data-subcategory-tabs]");
      const productGrid = document.querySelector("[data-product-grid]");
      const paginationWrapper = document.querySelector("[data-pagination-wrapper]");
      const pagination = document.querySelector("[data-pagination]");

      const getFilteredProducts = () => {
        return categoryProducts.filter((product) => {
          if (product.category !== activeCategory) {
            return false;
          }
          if (activeSubcategory === allLabel) {
            return true;
          }
          return product.subcategory === activeSubcategory;
        });
      };

      const renderSubcategories = () => {
        const subcategories = categorySubMap[activeCategory] || [];
        subcategoryTabs.innerHTML = "";

        const allButton = document.createElement("button");
        allButton.type = "button";
        allButton.dataset.subcategory = allLabel;
        allButton.textContent = allLabel;
        allButton.className = `${activeSubcategory === allLabel ? "segment-active" : "segment-btn"} shrink-0`;
        allButton.addEventListener("click", () => selectSubcategory(allLabel));
        subcategoryTabs.appendChild(allButton);

        subcategories.forEach((subcategory) => {
          const button = document.createElement("button");
          button.type = "button";
          button.dataset.subcategory = subcategory;
          button.textContent = subcategory;
          button.className = `${activeSubcategory === subcategory ? "segment-active" : "segment-btn"} shrink-0`;
          button.addEventListener("click", () => selectSubcategory(subcategory));
          subcategoryTabs.appendChild(button);
        });
      };

      const buildProductCard = (product) => {
        const imageSrc = product.image || "/images/product-placeholder.jpg";
        const showPremiumTag = activeCategory === "Triscent";

        return `
          <article class="prod-card group">
            <div class="prod-card-image">
              <img
                src="${imageSrc}"
                alt="${product.name}"
                loading="lazy"
              />
              ${showPremiumTag ? `
                <span class="absolute right-3 top-3 rounded-sm bg-(--color-accent-bright) px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-[#221b00]">
                  Premium
                </span>
              ` : ""}
            </div>
            <h3 class="prod-card-title">
              ${product.name}
            </h3>
            <p class="prod-card-desc">
              ${product.description}
            </p>
            <div class="prod-card-cta">
              <a href="/produk/${product.id}" class="primary-btn flex-1 text-center">
                Lihat Detail
              </a>
            </div>
          </article>
        `;
      };

      const renderProducts = () => {
        const filteredProducts = getFilteredProducts();
        const totalPages = Math.max(1, Math.ceil(filteredProducts.length / PRODUCTS_PER_PAGE));
        currentPage = Math.min(currentPage, totalPages);

        const startIndex = (currentPage - 1) * PRODUCTS_PER_PAGE;
        const paginated = filteredProducts.slice(startIndex, startIndex + PRODUCTS_PER_PAGE);

        productGrid.innerHTML = paginated
          .map((product, index) => {
            return `
              <div data-reveal data-delay="${index * 70}" class="transition-all duration-700 will-change-transform">
                ${buildProductCard(product)}
              </div>
            `;
          })
          .join("");

        renderPagination(totalPages, filteredProducts.length);
        initReveal(document.querySelectorAll("[data-reveal]"));
      };

      const renderPagination = (totalPages, totalItems) => {
        if (totalItems <= PRODUCTS_PER_PAGE) {
          paginationWrapper.classList.add("hidden");
          pagination.innerHTML = "";
          return;
        }

        paginationWrapper.classList.remove("hidden");
        pagination.innerHTML = "";

        const prevButton = document.createElement("button");
        prevButton.type = "button";
        prevButton.className = "pagi-btn pagi-btn--nav";
        prevButton.setAttribute("aria-label", "Halaman sebelumnya");
        prevButton.textContent = "\u2190";
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener("click", () => goToPage(currentPage - 1));
        pagination.appendChild(prevButton);

        for (let page = 1; page <= totalPages; page += 1) {
          const pageButton = document.createElement("button");
          pageButton.type = "button";
          pageButton.className = `pagi-btn ${currentPage === page ? "pagi-btn--active" : "pagi-btn--inactive"}`;
          pageButton.textContent = String(page);
          pageButton.addEventListener("click", () => goToPage(page));
          pagination.appendChild(pageButton);
        }

        const nextButton = document.createElement("button");
        nextButton.type = "button";
        nextButton.className = "pagi-btn pagi-btn--nav";
        nextButton.setAttribute("aria-label", "Halaman berikutnya");
        nextButton.textContent = "\u2192";
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener("click", () => goToPage(currentPage + 1));
        pagination.appendChild(nextButton);
      };

      const selectCategory = (category) => {
        activeCategory = category;
        activeSubcategory = allLabel;
        currentPage = 1;
        updateCategoryButtons();
        renderSubcategories();
        renderProducts();
      };

      const selectSubcategory = (subcategory) => {
        activeSubcategory = subcategory;
        currentPage = 1;
        updateSubcategoryButtons();
        renderProducts();
      };

      const goToPage = (page) => {
        const filteredProducts = getFilteredProducts();
        const totalPages = Math.max(1, Math.ceil(filteredProducts.length / PRODUCTS_PER_PAGE));

        if (page < 1 || page > totalPages) {
          return;
        }

        currentPage = page;
        renderProducts();
      };

      const updateCategoryButtons = () => {
        const buttons = categoryTabs.querySelectorAll("[data-category]");
        buttons.forEach((button) => {
          const isActive = button.dataset.category === activeCategory;
          button.classList.toggle("tab-btn-active", isActive);
          button.classList.toggle("tab-btn", !isActive);
        });
      };

      const updateSubcategoryButtons = () => {
        const buttons = subcategoryTabs.querySelectorAll("[data-subcategory]");
        buttons.forEach((button) => {
          const isActive = button.dataset.subcategory === activeSubcategory;
          button.classList.toggle("segment-active", isActive);
          button.classList.toggle("segment-btn", !isActive);
        });
      };

      const initCategoryTabs = () => {
        const buttons = categoryTabs.querySelectorAll("[data-category]");
        buttons.forEach((button) => {
          button.addEventListener("click", () => selectCategory(button.dataset.category));
        });
      };

      const initReveal = (elements) => {
        if (!elements || elements.length === 0) {
          return;
        }

        const showReveal = (element) => {
          element.style.opacity = "1";
          element.style.transform = "translateY(0)";
        };

        elements.forEach((element) => {
          const delay = Number(element.dataset.delay || "0");
          const distance = Number(element.dataset.distance || "16");
          element.style.transitionDelay = `${delay}ms`;
          element.style.opacity = "0";
          element.style.transform = `translateY(${distance}px)`;
        });

        if ("IntersectionObserver" in window) {
          const observer = new IntersectionObserver(
            (entries) => {
              entries.forEach((entry) => {
                if (entry.isIntersecting) {
                  showReveal(entry.target);
                  observer.unobserve(entry.target);
                }
              });
            },
            { threshold: 0.2 }
          );

          elements.forEach((element) => observer.observe(element));
        } else {
          elements.forEach(showReveal);
        }
      };

      initCategoryTabs();
      renderSubcategories();
      updateSubcategoryButtons();
      renderProducts();
      initReveal(document.querySelectorAll("[data-reveal]"));
    </script>
@endsection
