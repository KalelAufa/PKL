
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;
window.AOS = AOS;

Alpine.start();

import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobilePanel = document.getElementById('mobile-panel');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileCloseBtn = document.getElementById('mobile-menu-close');
    const iconBars = document.getElementById('icon-bars');
    const iconClose = document.getElementById('icon-close');

    function openMobileMenu() {
        mobileMenu.classList.remove('invisible');
        mobilePanel.classList.remove('translate-x-full');
        mobileOverlay.classList.remove('opacity-0');
        document.body.classList.add('overflow-hidden');
        menuBtn.setAttribute('aria-expanded', 'true');
        menuBtn.setAttribute('aria-label', 'Tutup menu');
        if (iconBars) iconBars.classList.add('hidden');
        if (iconClose) iconClose.classList.remove('hidden');
    }

    function closeMobileMenu() {
        mobilePanel.classList.add('translate-x-full');
        mobileOverlay.classList.add('opacity-0');
        document.body.classList.remove('overflow-hidden');
        menuBtn.setAttribute('aria-expanded', 'false');
        menuBtn.setAttribute('aria-label', 'Buka menu');
        if (iconBars) iconBars.classList.remove('hidden');
        if (iconClose) iconClose.classList.add('hidden');
        setTimeout(() => mobileMenu.classList.add('invisible'), 300);
    }

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            const isOpen = !mobileMenu.classList.contains('invisible');
            isOpen ? closeMobileMenu() : openMobileMenu();
        });

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', closeMobileMenu);
        }

        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', closeMobileMenu);
        }

        mobileMenu.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMobileMenu();
        });
    }

    // Counter animation
    const counterSection = document.querySelector('[data-counter-section]');
    if (counterSection) {
        const counters = counterSection.querySelectorAll('[data-counter]');
        let animated = false;

        const animateCounters = function () {
            if (animated) return;
            animated = true;
            counters.forEach(function (el) {
                const target = parseInt(el.dataset.counter, 10);
                const suffix = el.dataset.suffix || '';
                const duration = 1500;
                const step = Math.ceil(target / (duration / 16));
                let current = 0;
                const timer = setInterval(function () {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    el.textContent = current + suffix;
                }, 16);
            });
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.3 });

        observer.observe(counterSection);
    }

    const newsSwiper = document.querySelector('.news-swiper');
    if (newsSwiper) {
        new Swiper(newsSwiper, {
            modules: [Autoplay, Pagination],
            loop: true,
            autoplay: {
                delay: 4000,
                pauseOnMouseEnter: true,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 24 },
            },
        });
    }
});
