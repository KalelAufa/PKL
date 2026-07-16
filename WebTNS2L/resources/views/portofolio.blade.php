@extends('layouts.app')
@section('title', 'Portofolio')

@section('content')
    <div data-reveal class="transition-all duration-700 will-change-transform">
      <section class="site-container py-14 md:py-20">
        <p class="section-line"></p>
        <div class="mt-5 grid gap-10 md:grid-cols-[1fr_0.9fr] md:items-end">
          <h1 class="text-5xl font-medium uppercase leading-[0.95] tracking-[-0.04em] text-(--color-primary) md:text-8xl">
            {{ $portfolioPageContent['title'] }}
          </h1>
          <p class="max-w-lg text-base leading-8 text-(--color-muted)">
            {{ $portfolioPageContent['subtitle'] }}
          </p>
        </div>
      </section>
    </div>

    <div data-reveal data-delay="80" class="transition-all duration-700 will-change-transform">
      <section class="bg-(--color-surface-soft) py-8 md:py-12">
        <div class="site-container grid gap-1.5 md:grid-cols-3">
          @foreach ($portfolioProjects as $index => $project)
            <div data-reveal data-delay="{{ $index * 70 }}" class="transition-all duration-700 will-change-transform">
              <article class="group relative overflow-hidden rounded-[14px]">
                <img
                  src="{{ asset(ltrim($project['image'], '/')) }}"
                  alt="{{ $project['title'] }}"
                  class="h-60 w-full object-cover saturate-0 transition-transform duration-500 group-hover:scale-105 md:h-72.5"
                  loading="lazy"
                />
                <div class="absolute inset-0 bg-linear-to-t from-[rgba(15,63,20,0.8)] via-[rgba(15,63,20,0.16)] to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                  <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-(--color-accent-bright)">
                    {{ $project['sector'] }}
                  </p>
                  <h3 class="mt-1 text-[33px] leading-none font-medium tracking-tight text-white">
                    {{ $project['title'] }}
                  </h3>
                </div>
              </article>
            </div>
          @endforeach
        </div>
      </section>
    </div>

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
    </script>
@endsection
