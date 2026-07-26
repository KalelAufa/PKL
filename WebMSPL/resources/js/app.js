
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
import '@fortawesome/fontawesome-free/css/all.min.css';

document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileCloseBtn = document.getElementById('mobile-menu-close');

    function openMobileMenu() {
        mobileMenu.classList.remove('translate-x-full');
        menuBtn.setAttribute('aria-expanded', 'true');
        menuBtn.setAttribute('aria-label', 'Tutup menu');
        const icon = menuBtn.querySelector('.menu-icon');
        if (icon) { icon.classList.remove('fa-bars'); icon.classList.add('fa-xmark'); }
    }

    function closeMobileMenu() {
        mobileMenu.classList.add('translate-x-full');
        menuBtn.setAttribute('aria-expanded', 'false');
        menuBtn.setAttribute('aria-label', 'Buka menu');
        const icon = menuBtn.querySelector('.menu-icon');
        if (icon) { icon.classList.add('fa-bars'); icon.classList.remove('fa-xmark'); }
    }

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            const isOpen = !mobileMenu.classList.contains('translate-x-full');
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
