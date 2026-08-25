/**
 * O Bosque Fantasma — main.js
 * Vanilla JS, no dependencies.
 *
 * - Sticky header glow on scroll
 * - Mobile menu toggle
 * - Subtle parallax / fog animation on hero
 * - Staggered reveal-on-scroll for .reveal elements
 * - Cart count update hook (listens to WooCommerce fragments)
 */
(function () {
    'use strict';

    var header = document.getElementById('masthead');
    var menuToggle = document.getElementById('menu-toggle');
    var primaryNav = document.getElementById('primary-nav');
    var heroFog = document.querySelector('.hero__fog');
    var heroRings = document.querySelector('.hero__rings');

    /* ---------- Sticky header glow ---------- */
    function onScrollHeader() {
        if (!header) { return; }
        if (window.scrollY > 24) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }
    window.addEventListener('scroll', onScrollHeader, { passive: true });
    onScrollHeader();

    /* ---------- Mobile menu toggle ---------- */
    if (menuToggle && primaryNav) {
        menuToggle.addEventListener('click', function () {
            var expanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!expanded));
            primaryNav.classList.toggle('is-open', !expanded);
            document.body.style.overflow = !expanded ? 'hidden' : '';
        });

        // Close menu when a link is clicked (mobile).
        primaryNav.addEventListener('click', function (e) {
            if (e.target.tagName === 'A') {
                menuToggle.setAttribute('aria-expanded', 'false');
                primaryNav.classList.remove('is-open');
                document.body.style.overflow = '';
            }
        });

        // Close on Escape.
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && primaryNav.classList.contains('is-open')) {
                menuToggle.setAttribute('aria-expanded', 'false');
                primaryNav.classList.remove('is-open');
                document.body.style.overflow = '';
            }
        });
    }

    /* ---------- Hero parallax / fog drift ---------- */
    if (heroFog && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        var ticking = false;
        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    var y = window.scrollY;
                    if (y < window.innerHeight) {
                        // Parallax: move fog slowly, rings slightly faster.
                        heroFog.style.transform = 'translate3d(0, ' + (y * 0.18) + 'px, 0)';
                        if (heroRings) {
                            heroRings.style.transform = 'translate(-50%, calc(-50% + ' + (y * 0.08) + 'px))';
                        }
                    }
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

    /* ---------- Reveal on scroll ---------- */
    var reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && reveals.length) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach(function (el) { io.observe(el); });
    } else {
        // Fallback: just show everything.
        reveals.forEach(function (el) { el.classList.add('is-visible'); });
    }

    /* ---------- Cart count update hook ---------- */
    // WooCommerce refreshes fragments via AJAX on add-to-cart. The fragment
    // replaces span.cart-link__count. We also reflect the new count on the
    // data-cart-count attribute and pulse the icon.
    function pulseCart() {
        var cartLink = document.querySelector('.cart-link');
        if (!cartLink) { return; }
        cartLink.classList.add('is-pulsing');
        setTimeout(function () { cartLink.classList.remove('is-pulsing'); }, 600);
    }

    // Listen for fragment updates (jQuery triggers 'wc_fragments_refreshed'
    // and 'added_to_cart'). We hook both via jQuery if present, plus a
    // MutationObserver fallback on the count element.
    if (window.jQuery) {
        jQuery(function ($) {
            jQuery(document.body).on('added_to_cart wc_fragments_refreshed wc_fragments_loaded', function () {
                pulseCart();
            });
        });
    }

    var countEl = document.querySelector('.cart-link__count');
    if (countEl && 'MutationObserver' in window) {
        var mo = new MutationObserver(function () {
            pulseCart();
        });
        mo.observe(countEl, { childList: true, subtree: true, characterData: true });
    }

    /* ---------- Newsletter form (demo, no backend) ---------- */
    var newsletter = document.querySelector('.cta-band__form');
    if (newsletter) {
        newsletter.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = newsletter.querySelector('input[type="email"]');
            var btn = newsletter.querySelector('button[type="submit"]');
            if (input && input.value && btn) {
                var original = btn.textContent;
                btn.textContent = '✓ Inscrito!';
                btn.disabled = true;
                input.value = '';
                setTimeout(function () {
                    btn.textContent = original;
                    btn.disabled = false;
                }, 2400);
            }
        });
    }

})();
