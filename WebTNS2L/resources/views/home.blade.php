@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="relative overflow-hidden bg-[linear-gradient(170deg,#f8f7f2_0%,#f9f9f6_44%,#f7f5ec_100%)] py-14 md:py-22">
        <div class="pointer-events-none absolute -top-28 right-[3%] h-64 w-64 rounded-full bg-[radial-gradient(circle,rgba(241,196,15,0.2)_0%,rgba(241,196,15,0)_72%)]"></div>
        <div class="pointer-events-none absolute -left-14 top-8 h-56 w-56 rounded-full bg-[radial-gradient(circle,rgba(0,46,31,0.1)_0%,rgba(0,46,31,0)_72%)]"></div>

        <div class="site-container relative grid gap-12 lg:grid-cols-[1fr_0.86fr] lg:items-center">
          <div>
            <p class="inline-flex items-center rounded-full border border-(--color-border) bg-white/80 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-(--color-primary)">
              PT Tricipta Niaga Sukses
            </p>
            <p class="section-line mt-6"></p>
            <h1 class="section-title-xl mt-6 max-w-3xl text-balance font-semibold text-(--color-primary)">
              {{ $homePageContent['title'] }}
            </h1>

            <p class="mt-7 max-w-2xl text-base leading-8 text-(--color-muted) md:text-lg">
              {{ $homePageContent['subtitle'] }}
            </p>

            <div class="mt-6 flex flex-wrap gap-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-(--color-primary)">
              <span class="rounded-full border border-(--color-border) bg-white px-3 py-1.5">General Trading</span>
              <span class="rounded-full border border-(--color-border) bg-white px-3 py-1.5">Rental System</span>
              <span class="rounded-full border border-(--color-border) bg-white px-3 py-1.5">Maintenance</span>
            </div>

            <div class="mt-7 flex flex-wrap gap-3">
              <a href="/kategori" class="primary-btn">{{ $homePageContent['ctaPrimary'] }}</a>
              <a href="/hubungi-kami" class="ghost-btn">{{ $homePageContent['ctaSecondary'] }}</a>
            </div>
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-0 -z-10 rounded-[26px] bg-[radial-gradient(circle_at_80%_20%,rgba(241,196,15,0.28)_0%,rgba(241,196,15,0)_60%)]"></div>
            <div class="relative h-[320px] overflow-hidden rounded-[22px] bg-[var(--color-surface-soft)] sm:h-[520px]" data-carousel>
              @foreach ($heroCarouselImages as $index => $image)
                <div class="absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-slide>
                  <img
                    src="{{ asset(ltrim($image['src'], '/')) }}"
                    alt="{{ $image['alt'] }}"
                    class="h-full w-full object-cover"
                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                  />
                </div>
              @endforeach

              <div class="absolute inset-x-4 bottom-4 flex gap-2" data-carousel-dots>
                @foreach ($heroCarouselImages as $index => $image)
                  <button
                    type="button"
                    class="h-2.5 rounded-full transition-all {{ $index === 0 ? 'w-8 bg-[var(--color-accent-bright)]' : 'w-2.5 bg-white/70' }}"
                    data-carousel-dot
                    data-index="{{ $index }}"
                    aria-label="Show slide {{ $index + 1 }}"
                  ></button>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="bg-(--color-surface-soft) py-12 md:py-20">
        <div class="site-container">
          <p class="section-line"></p>
          <h2 class="mt-4 text-4xl font-semibold tracking-[-0.03em] text-foreground md:text-6xl">
            {{ $homePageContent['productTitle'] }}
          </h2>

          <div class="mt-10 hidden items-center justify-between gap-4 lg:flex">
            <p class="text-xs font-semibold uppercase tracking-[0.14em] text-(--color-muted)">
              {{ $homePageContent['productHint'] }}
            </p>
          </div>

          <div class="mt-4 grid gap-8 md:grid-cols-2 lg:flex lg:snap-x lg:snap-mandatory lg:gap-6 lg:overflow-x-auto lg:pb-4 lg:pr-2">
            @foreach ($homeSolutionCards as $index => $card)
              <div
                data-reveal
                data-delay="{{ $index * 100 }}"
                class="h-full transition-all duration-700 will-change-transform lg:w-115 lg:shrink-0 lg:snap-start">
                <article class="group flex h-full min-h-80 flex-col rounded-[20px] border border-(--color-border-soft) bg-white p-8 shadow-[0_10px_30px_rgba(0,31,20,0.06)] md:p-10">
                  <h3 class="min-h-22 text-3xl leading-tight font-medium tracking-[-0.03em] text-(--color-primary)">
                    {{ $card['title'] }}
                  </h3>
                  <p class="mt-4 max-w-xl text-base leading-7 text-(--color-muted)">
                    {{ $card['body'] }}
                  </p>
                  <a
                    href="{{ $card['href'] }}"
                    class="mt-auto inline-block pt-7 text-xs font-semibold uppercase tracking-[0.14em] text-(--color-primary) group-hover:text-(--color-accent)">
                    Jelajahi Katalog &rarr;
                  </a>
                </article>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>

    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="site-container py-12 md:py-16">
        <div class="flex items-end justify-between gap-4">
          <div>
            <p class="section-line"></p>
            <h2 class="mt-4 text-3xl font-semibold tracking-[-0.03em] text-(--color-primary) md:text-5xl">
              Produk Unggulan Kami
            </h2>
          </div>
          <p class="hidden text-xs font-semibold uppercase tracking-[0.14em] text-(--color-muted) md:block">
            Koleksi terpilih dari katalog Triscent
          </p>
        </div>

        <div class="relative mt-8 overflow-x-auto rounded-[22px] border border-(--color-border-soft) bg-white p-4 shadow-[0_14px_35px_rgba(0,31,20,0.06)] md:overflow-hidden md:p-6 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
          <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-10 bg-gradient-to-r from-(--color-surface) to-transparent md:w-20"></div>
          <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-10 bg-gradient-to-l from-(--color-surface) to-transparent md:w-20"></div>

          <div class="flex w-max gap-4 py-1 md:gap-6 md:py-2 motion-safe:animate-[featured-marquee_36s_linear_infinite] hover:[animation-play-state:paused]">
            @foreach ($featuredProductsLoop as $index => $product)
              <article class="group relative w-56 shrink-0 overflow-hidden rounded-2xl border border-(--color-border-soft) bg-white shadow-[0_8px_22px_rgba(0,31,20,0.08)] md:w-72">
                <div class="relative aspect-[4/3] w-full">
                  <img
                    src="{{ asset(ltrim($product['image'], '/')) }}"
                    alt="{{ $product['name'] }}"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    loading="lazy"
                  />
                  <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent px-4 py-3">
                    <p class="text-sm font-medium tracking-[-0.01em] text-white md:text-base">
                      {{ $product['name'] }}
                    </p>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
        </div>
      </section>
    </div>

    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="site-container py-14 md:py-20">
        <div class="grid gap-8 md:grid-cols-[0.9fr_1fr] md:items-end">
          <h2 class="text-4xl font-semibold leading-[1.04] tracking-[-0.03em] text-foreground md:text-6xl">
            {{ $homePageContent['whyTitle'] }}
          </h2>

          <p class="text-base leading-8 text-(--color-muted)">
            {{ $homePageContent['whyBody'] }}
          </p>
        </div>

        <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          @foreach ($whyChooseItems as $index => $item)
            <div data-reveal data-delay="{{ $index * 80 }}" class="transition-all duration-700 will-change-transform">
              <article class="rounded-2xl border border-(--color-border-soft) bg-white p-6 shadow-[0_10px_28px_rgba(0,31,20,0.05)]">
                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded bg-[rgba(241,196,15,0.16)] text-(--color-primary)">
                  @php
                    $iconIndex = $index % count($whyChooseIcons);
                  @endphp
                  {!! $whyChooseIcons[$iconIndex] !!}
                </div>
                <h3 class="text-sm font-semibold tracking-[0.01em] text-foreground">
                  {{ $item['title'] }}
                </h3>
                <p class="mt-3 text-sm leading-6 text-(--color-muted)">
                  {{ $item['body'] }}
                </p>
              </article>
            </div>
          @endforeach
        </div>
      </section>
    </div>

    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="bg-(--color-surface-soft) py-16 md:py-20">
        <div class="site-container rounded-[26px] border border-(--color-border-soft) bg-[linear-gradient(150deg,rgba(255,255,255,0.96)_0%,rgba(255,249,220,0.54)_100%)] px-6 py-14 text-center shadow-[0_18px_44px_rgba(0,31,20,0.08)] md:px-10 md:py-16">
          <p class="section-line mx-auto"></p>
          <h2 class="mt-4 text-4xl font-semibold tracking-[-0.03em] text-(--color-primary) md:text-6xl">
            {{ $homePageContent['contactTitle'] }}
          </h2>
          <p class="mx-auto mt-4 max-w-3xl text-base leading-8 text-(--color-muted)">
            {{ $homePageContent['contactBody'] }}
          </p>
          <a href="/hubungi-kami" class="primary-btn mt-8 inline-flex">
            {{ $homePageContent['contactCta'] }}
          </a>
        </div>
      </section>
    </div>

    <style>
      @keyframes featured-marquee {
        0% {
          transform: translateX(0);
        }
        100% {
          transform: translateX(-50%);
        }
      }
    </style>

    <script>
      const carousel = document.querySelector("[data-carousel]");

      if (carousel) {
        const slides = carousel.querySelectorAll("[data-slide]");
        const dots = carousel.querySelectorAll("[data-carousel-dot]");
        let activeIndex = 0;
        let intervalId = null;

        const setActiveSlide = (index) => {
          activeIndex = index;
          slides.forEach((slide, slideIndex) => {
            slide.classList.toggle("opacity-100", slideIndex === index);
            slide.classList.toggle("opacity-0", slideIndex !== index);
          });
          dots.forEach((dot, dotIndex) => {
            dot.classList.toggle("w-8", dotIndex === index);
            dot.classList.toggle("bg-[var(--color-accent-bright)]", dotIndex === index);
            dot.classList.toggle("w-2.5", dotIndex !== index);
            dot.classList.toggle("bg-white/70", dotIndex !== index);
          });
        };

        const startCarousel = () => {
          if (intervalId) {
            clearInterval(intervalId);
          }
          intervalId = setInterval(() => {
            setActiveSlide((activeIndex + 1) % slides.length);
          }, 3500);
        };

        dots.forEach((dot) => {
          dot.addEventListener("click", () => {
            const index = Number(dot.dataset.index || "0");
            setActiveSlide(index);
            startCarousel();
          });
        });

        startCarousel();
      }

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
    </script>
@endsection
