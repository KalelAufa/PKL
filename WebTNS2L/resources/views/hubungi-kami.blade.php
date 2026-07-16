@extends('layouts.app')
@section('title', 'Hubungi Kami')

@section('content')
    <section class="site-container py-14 md:py-20">
      <div data-reveal class="transition-all duration-700 will-change-transform">
        <div class="max-w-4xl">
          <p class="section-line"></p>
          <h1 class="section-title-xl mt-4 max-w-2xl font-medium text-(--color-primary)">
            {{ $contactPageContent['title'] }}
          </h1>
          <p class="mt-6 max-w-2xl text-lg leading-8 text-(--color-muted)">
            {{ $contactPageContent['subtitle'] }}
          </p>
        </div>
      </div>

      <div data-reveal data-delay="80" class="transition-all duration-700 will-change-transform">
        <div class="mt-12 grid overflow-hidden rounded-[18px] border border-(--color-border-soft) bg-white md:grid-cols-3">
          @foreach ($contactCards as $index => $card)
            <div data-reveal data-delay="{{ $index * 70 }}" class="transition-all duration-700 will-change-transform">
              <article class="border-b border-(--color-border-soft) p-8 md:border-b-0 {{ $index < count($contactCards) - 1 ? 'md:border-r' : '' }}">
                <div class="mb-5 flex h-10 w-10 items-center justify-center rounded-md bg-(--color-surface-soft) text-(--color-primary)">
                  {{ $index === 0 ? '@' : ($index === 1 ? 'W' : '#') }}
                </div>
                <p class="text-lg font-semibold uppercase tracking-[-0.01em] text-(--color-primary)">
                  {{ $card['title'] }}
                </p>
                <p class="mt-3 text-sm leading-7 text-(--color-muted)">
                  @foreach ($card['value'] as $lineIndex => $line)
                    <span>{{ $line }}</span>@if ($lineIndex < count($card['value']) - 1)<br />@endif
                  @endforeach
                </p>
              </article>
            </div>
          @endforeach
        </div>
      </div>

      <div data-reveal data-delay="120" class="transition-all duration-700 will-change-transform">
        <div class="mt-14 grid gap-10 lg:grid-cols-[1fr_1.3fr]">
          <div class="overflow-hidden rounded-lg border border-(--color-border-soft) bg-white shadow-[0_2px_10px_rgba(0,0,0,0.04)]">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d263.5735095434417!2d112.68255274014892!3d-7.450984816964875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1cdf7d4e83f%3A0xf726c87aebe7a8fc!2sJasa%20Konsultan%20Lingkungan%20(AMDAL%2C%20UKL-UPL%2C%20IPAL%2C%20SIPA)%2C%20PT%20MSP!5e1!3m2!1sen!2sid!4v1775998773561!5m2!1sen!2sid"
              title="Lokasi PT Tricipta Niaga Sukses"
              class="h-105 w-full md:h-130"
              style="border: 0;"
              allowfullscreen
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>

          <form id="contact-form" class="rounded-lg bg-(--color-surface-soft) p-6 shadow-[0_2px_10px_rgba(0,0,0,0.04)] md:p-10">
            <div class="grid gap-6 md:grid-cols-2">
              <label class="space-y-2">
                <span class="field-label">{{ $contactFormCopy['fullNameLabel'] }}</span>
                <input
                  class="field-input"
                  type="text"
                  name="full_name"
                  placeholder="{{ $contactFormCopy['fullNamePlaceholder'] }}"
                  required
                />
              </label>

              <label class="space-y-2">
                <span class="field-label">{{ $contactFormCopy['emailLabel'] }}</span>
                <input
                  class="field-input"
                  type="email"
                  name="email"
                  placeholder="{{ $contactFormCopy['emailPlaceholder'] }}"
                  required
                />
              </label>
            </div>

            <label class="mt-6 block space-y-2">
              <span class="field-label">{{ $contactFormCopy['needLabel'] }}</span>
              <select class="field-input appearance-none" name="need_category">
                @foreach ($contactNeedOptions as $option)
                  <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
              </select>
            </label>

            <label class="mt-6 block space-y-2">
              <span class="field-label">{{ $contactFormCopy['messageLabel'] }}</span>
              <textarea
                class="field-input min-h-32 resize-y"
                name="message"
                placeholder="{{ $contactFormCopy['messagePlaceholder'] }}"
                required
              ></textarea>
            </label>

            <button type="submit" class="primary-btn mt-8 w-full py-4 text-base">
              {{ $contactFormCopy['submitLabel'] }}
            </button>
          </form>
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

      const contactForm = document.querySelector("#contact-form");

      if (contactForm) {
        contactForm.addEventListener("submit", (event) => {
          event.preventDefault();

          const formData = new FormData(contactForm);
          const fullName = formData.get("full_name") || "";
          const email = formData.get("email") || "";
          const needCategory = formData.get("need_category") || "";
          const message = formData.get("message") || "";

          const waMessage = `Halo Tim PT Tricipta Niaga Sukses,\nNama: ${fullName}\nEmail: ${email}\nKategori Kebutuhan: ${needCategory}\n\nDetail Pesan:\n${message}\n\nMohon dibantu penjelasan dan penawaran terbaiknya.\n\nTerima kasih.`;

          const link = `${@json($companyProfile['whatsappLink'])}?text=${encodeURIComponent(waMessage)}`;
          window.open(link, "_blank", "noopener,noreferrer");
        });
      }
    </script>
@endsection
