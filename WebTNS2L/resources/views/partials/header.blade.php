<header class="sticky top-0 z-50 border-b border-[var(--color-border-soft)] bg-[rgba(249,249,246,0.92)] backdrop-blur-md">
    <div class="site-container flex h-18 items-center justify-between gap-4">
      <a
        href="/"
        class="text-lg font-semibold tracking-tight text-[var(--color-primary)]">
        PT Tricipta Niaga Sukses
      </a>

      <nav
        class="hidden items-center gap-10 md:flex"
        aria-label="Navigasi utama">
          <a
            href="/"
            class="border-b-2 pb-1 text-xs font-semibold uppercase tracking-[0.14em] transition-colors {{ request()->is('/') ? 'border-[var(--color-accent)] text-[var(--color-primary)]' : 'border-transparent text-[var(--color-text)]/80 hover:text-[var(--color-primary)]' }}">
            Beranda
          </a>
          <a
            href="/kategori"
            class="border-b-2 pb-1 text-xs font-semibold uppercase tracking-[0.14em] transition-colors {{ request()->is('kategori') || request()->is('produk*') ? 'border-[var(--color-accent)] text-[var(--color-primary)]' : 'border-transparent text-[var(--color-text)]/80 hover:text-[var(--color-primary)]' }}">
            Produk
          </a>
          <a
            href="/portofolio"
            class="border-b-2 pb-1 text-xs font-semibold uppercase tracking-[0.14em] transition-colors {{ request()->is('portofolio') ? 'border-[var(--color-accent)] text-[var(--color-primary)]' : 'border-transparent text-[var(--color-text)]/80 hover:text-[var(--color-primary)]' }}">
            Portofolio
          </a>
          <a
            href="/hubungi-kami"
            class="border-b-2 pb-1 text-xs font-semibold uppercase tracking-[0.14em] transition-colors {{ request()->is('hubungi-kami') ? 'border-[var(--color-accent)] text-[var(--color-primary)]' : 'border-transparent text-[var(--color-text)]/80 hover:text-[var(--color-primary)]' }}">
            Hubungi Kami
          </a>
      </nav>

      <button
        type="button"
        id="mobile-menu-btn"
        class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[var(--color-border)] text-[var(--color-primary)] md:hidden"
        aria-label="Buka atau tutup menu navigasi"
        aria-expanded="false">
          <svg
            id="mobile-menu-icon-open"
            viewBox="0 0 24 24"
            class="h-5 w-5"
            fill="none"
            aria-hidden="true">
            <path
              d="M4 7h16M4 12h16M4 17h16"
              stroke="currentColor"
              stroke-width="1.8"
              stroke-linecap="round"
            />
          </svg>
          <svg
            id="mobile-menu-icon-close"
            viewBox="0 0 24 24"
            class="hidden h-5 w-5"
            fill="none"
            aria-hidden="true">
            <path
              d="M6 6l12 12M18 6 6 18"
              stroke="currentColor"
              stroke-width="1.8"
              stroke-linecap="round"
            />
          </svg>
      </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-[var(--color-border-soft)] bg-[var(--color-surface)] md:hidden">
      <nav
        class="site-container flex flex-col gap-4 py-5"
        aria-label="Navigasi seluler">
          <a
            href="/"
            class="rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.12em] {{ request()->is('/') ? 'bg-[var(--color-primary)] text-white' : 'bg-white text-foreground' }}">
            Beranda
          </a>
          <a
            href="/kategori"
            class="rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.12em] {{ request()->is('kategori') || request()->is('produk*') ? 'bg-[var(--color-primary)] text-white' : 'bg-white text-foreground' }}">
            Produk
          </a>
          <a
            href="/portofolio"
            class="rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.12em] {{ request()->is('portofolio') ? 'bg-[var(--color-primary)] text-white' : 'bg-white text-foreground' }}">
            Portofolio
          </a>
          <a
            href="/hubungi-kami"
            class="rounded-xl px-4 py-3 text-sm font-semibold uppercase tracking-[0.12em] {{ request()->is('hubungi-kami') ? 'bg-[var(--color-primary)] text-white' : 'bg-white text-foreground' }}">
            Hubungi Kami
          </a>
      </nav>
    </div>

    <!-- Toggle Navbar Script -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('mobile-menu-icon-open');
        const iconClose = document.getElementById('mobile-menu-icon-close');

        if(btn) {
          btn.addEventListener('click', () => {
             const isExpanded = btn.getAttribute('aria-expanded') === 'true';
             btn.setAttribute('aria-expanded', !isExpanded);
             menu.classList.toggle('hidden');
             iconOpen.classList.toggle('hidden');
             iconClose.classList.toggle('hidden');
          });
        }
      });
    </script>
</header>
