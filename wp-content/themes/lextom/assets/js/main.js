/**
 * LeXtom Theme — Main JavaScript
 *
 * Handles: navigation scroll, mobile menu, language switching,
 * reveal-on-scroll animations.
 */

(function () {
  'use strict';

  /* ---------- NAV SCROLL ---------- */
  var nav = document.getElementById('nav');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', window.scrollY > 40);
    });
  }

  /* ---------- MOBILE MENU ---------- */
  var toggle = document.getElementById('navtoggle');
  var links = document.getElementById('navlinks');
  if (toggle && links) {
    toggle.addEventListener('click', function () {
      links.classList.toggle('open');
      toggle.textContent = links.classList.contains('open') ? '\u2715' : '\u2630';
    });
    links.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        links.classList.remove('open');
        toggle.textContent = '\u2630';
      });
    });
  }

  /* ---------- REVEAL ON SCROLL ---------- */
  var observer = null;
  var reveals = document.querySelectorAll('.reveal');
  if (reveals.length && 'IntersectionObserver' in window) {
    observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('in');
            observer.unobserve(e.target);
          }
        });
      },
      { threshold: 0.15 }
    );
    reveals.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    reveals.forEach(function (el) {
      el.classList.add('in');
    });
  }

  /* ---------- LANGUAGE SWITCHER (JS-based, fallback when Polylang is not active) ---------- */
  window.setLang = function (lang) {
    localStorage.setItem('lextom_lang', lang);

    // Update button states
    document.querySelectorAll('.lang button').forEach(function (btn) {
      btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
    });

    // Swap text content
    document.querySelectorAll('[data-sk][data-en]').forEach(function (el) {
      var text = el.getAttribute('data-' + lang);
      if (text) {
        el.textContent = text;
      }
    });

    // Swap language-specific images
    document.querySelectorAll('.langimg').forEach(function (img) {
      var forLang = img.getAttribute('data-for');
      img.classList.toggle('show', forLang === lang);
    });

    // Toggle lang-sk / lang-en blocks
    document.querySelectorAll('.lang-sk, .lang-en').forEach(function (el) {
      el.style.display = el.classList.contains('lang-' + lang) ? '' : 'none';
    });
  };

  // Restore saved language on page load
  var savedLang = localStorage.getItem('lextom_lang');
  if (savedLang && !document.body.classList.contains('polylang-active')) {
    window.setLang(savedLang);
  }

  /* ---------- EXPANDABLE CONTENT (KNOW MORE) ---------- */
  var btnKM = document.getElementById('btnKnowMore');
  var expContent = document.getElementById('expandableContent');
  if (btnKM && expContent) {
    btnKM.addEventListener('click', function () {
      expContent.classList.toggle('open');
      btnKM.classList.toggle('expanded');
      if (expContent.classList.contains('open')) {
        // Re-observe reveals inside expanded content
        expContent.querySelectorAll('.reveal').forEach(function (el) {
          if (observer) observer.observe(el);
        });
        setTimeout(function () {
          expContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
      }
    });
  }

  /* ---------- PRODUCT GALLERY THUMBNAILS ---------- */
  document.querySelectorAll('.gallery .thumbs .t').forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      var gallery = thumb.closest('.gallery');
      if (!gallery) return;
      var mainImg = gallery.querySelector('.main img');
      var thumbImg = thumb.querySelector('img');
      if (mainImg && thumbImg) {
        mainImg.src = thumbImg.src;
        gallery.querySelectorAll('.thumbs .t').forEach(function (t) {
          t.classList.remove('active');
        });
        thumb.classList.add('active');
      }
    });
  });
})();
