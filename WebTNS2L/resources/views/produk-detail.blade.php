@extends('layouts.app')
@section('title', $product['name'] . ' - Detail Produk')

@section('content')
    <section class="site-container py-10 md:py-14">
      <div data-reveal class="transition-all duration-700 will-change-transform">
        <nav class="text-[11px] font-semibold uppercase tracking-[0.13em] text-(--color-muted)">
          Beranda / Kategori / <span class="text-(--color-primary)">{{ $product['name'] }}</span>
        </nav>
      </div>

      <div data-reveal data-delay="70" class="transition-all duration-700 will-change-transform">
        <div class="mt-6 grid gap-8 lg:grid-cols-[1.25fr_1fr]">
          <div data-gallery>
            <div class="relative aspect-4/3 w-full overflow-hidden rounded-md bg-(--color-surface-soft)">
              @foreach (($product['images'] ?? [$product['image'] ?? '/images/product-placeholder.jpg']) as $index => $image)
                <img
                  src="{{ asset(ltrim($image, '/')) }}"
                  alt="{{ $product['name'] }} image {{ $index + 1 }}"
                  class="absolute inset-0 h-full w-full object-contain object-center p-4 transition-opacity duration-300 {{ $index === 0 ? 'opacity-100' : 'pointer-events-none opacity-0' }}"
                  data-gallery-slide
                  data-index="{{ $index }}"
                  loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                />
              @endforeach
            </div>

            <div class="mt-4 overflow-x-auto pb-1">
              <div class="flex min-w-full justify-center">
                <div class="flex w-max gap-3 px-2" data-gallery-thumbs>
                  @foreach (($product['images'] ?? [$product['image'] ?? '/images/product-placeholder.jpg']) as $index => $image)
                    <button
                      type="button"
                      class="overflow-hidden rounded-md border-2 transition-colors {{ $index === 0 ? 'border-[#0F3F14]' : 'border-[rgba(15,63,20,0.18)] hover:border-[rgba(15,63,20,0.45)]' }}"
                      data-gallery-thumb
                      data-index="{{ $index }}"
                      aria-label="Pilih foto {{ $index + 1 }}">
                      <img
                        src="{{ asset(ltrim($image, '/')) }}"
                        alt="{{ $product['name'] }} thumbnail {{ $index + 1 }}"
                        class="h-15 w-20 object-cover"
                        loading="lazy"
                      />
                    </button>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div>
            <span class="inline-flex rounded-sm bg-(--color-accent-bright) px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-[#221b00]">
              {{ $productDetailPageContent['grade'] }}
            </span>

            <h1 class="mt-4 text-4xl font-medium uppercase leading-[1.02] tracking-[-0.03em] text-(--color-primary) md:text-6xl">
              {{ $product['name'] }}
            </h1>

            <p class="mt-4 text-base leading-7 text-(--color-muted)">
              {{ $product['description'] }}
            </p>

            <div class="mt-8 border-t border-(--color-border-soft) pt-6">
              <h2 class="text-sm font-semibold uppercase tracking-[0.14em] text-(--color-accent)">
                {{ $productDetailPageContent['specificationTitle'] }}
              </h2>

              <div class="mt-4 grid gap-3 sm:grid-cols-2">
                @foreach ($specs as $index => $spec)
                  <div data-reveal data-delay="{{ $index * 65 }}" class="transition-all duration-700 will-change-transform">
                    <article class="rounded-sm bg-(--color-surface-soft) p-4">
                      <p class="text-[10px] uppercase tracking-[0.12em] text-(--color-muted)">
                        {{ $spec['label'] }}
                      </p>
                      <p class="mt-1 text-sm font-semibold text-foreground">
                        {{ $spec['value'] }}
                      </p>
                    </article>
                  </div>
                @endforeach
              </div>
            </div>

            <a
              href="{{ $companyProfile['whatsappLink'] }}?text={{ urlencode("Halo Tim PT Tricipta Niaga Sukses,\nSaya tertarik dengan produk: " . $product['name'] . "\nMohon informasi lebih detail mengenai:\n- Harga terbaru\n- Spesifikasi lengkap\n- Ketersediaan stok\n- Estimasi pengiriman ke: [Kota/Alamat]\n\nNama: [Nama Anda]\nKontak: [No. HP / Email]\n\nTerima kasih atas bantuannya.") }}"
              target="_blank"
              rel="noreferrer"
              class="primary-btn mt-8 flex items-center justify-center">
              {{ $productDetailPageContent['cta'] }}
            </a>
          </div>
        </div>
      </div>

      <div data-reveal data-delay="120" class="transition-all duration-700 will-change-transform">
        <div class="mt-16">
          <div class="flex items-center justify-between gap-4">
            <h2 class="text-3xl font-semibold uppercase tracking-[-0.03em] text-(--color-primary)">
              {{ $productDetailPageContent['relatedTitle'] }}
            </h2>
            <a
              href="/kategori"
              class="text-xs font-semibold uppercase tracking-[0.13em] text-(--color-accent)">
              {{ $productDetailPageContent['allCategoryLabel'] }}
            </a>
          </div>

          <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($relatedProducts as $index => $related)
              <div data-reveal data-delay="{{ $index * 70 }}" class="transition-all duration-700 will-change-transform">
                <article class="group flex h-full min-h-100.5 flex-col rounded-[14px] border border-[rgba(193,201,188,0.35)] bg-white p-3 shadow-[0_2px_10px_rgba(0,0,0,0.03)] transition-shadow hover:shadow-[0_12px_30px_rgba(15,63,20,0.12)]">
                  <div class="relative overflow-hidden rounded-sm bg-(--color-surface-soft)">
                    <img
                      src="{{ asset(ltrim($related['image'] ?? '/images/product-placeholder.jpg', '/')) }}"
                      alt="{{ $related['name'] }}"
                      class="h-52 w-full object-contain object-center p-2 transition-transform duration-500 group-hover:scale-[1.02]"
                      loading="lazy"
                    />
                  </div>

                  <h3 class="mt-4 truncate text-base font-medium tracking-tight text-(--color-primary)">
                    {{ $related['name'] }}
                  </h3>
                  <p class="mt-2 line-clamp-2 text-sm leading-6 text-(--color-muted)">
                    {{ $related['description'] }}
                  </p>

                  <div class="mt-auto flex items-center gap-3 pt-5">
                    <a href="/produk/{{ $related['id'] }}" class="primary-btn flex-1 text-center">
                      Lihat Detail
                    </a>
                  </div>
                </article>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <script>
      const revealElements = document.querySelectorAll("[data-reveal]");

      const showReveal = (element) => {
        element.style.opacity = "1";
        element.style.transform = "translateY(0)";
      };

      revealElements.forEach((element) => {
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

        revealElements.forEach((element) => observer.observe(element));
      } else {
        revealElements.forEach(showReveal);
      }

      const gallery = document.querySelector("[data-gallery]");

      if (gallery) {
        const slides = gallery.querySelectorAll("[data-gallery-slide]");
        const thumbs = gallery.querySelectorAll("[data-gallery-thumb]");

        const setActiveSlide = (index) => {
          slides.forEach((slide, slideIndex) => {
            slide.classList.toggle("opacity-100", slideIndex === index);
            slide.classList.toggle("opacity-0", slideIndex !== index);
            slide.classList.toggle("pointer-events-none", slideIndex !== index);
          });

          thumbs.forEach((thumb, thumbIndex) => {
            thumb.classList.toggle("border-[#0F3F14]", thumbIndex === index);
            thumb.classList.toggle("border-[rgba(15,63,20,0.18)]", thumbIndex !== index);
          });
        };

        thumbs.forEach((thumb) => {
          thumb.addEventListener("click", () => {
            const index = Number(thumb.dataset.index || "0");
            setActiveSlide(index);
          });
        });
      }
    </script>
@endsection
