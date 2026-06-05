/* ICE FORCE — main.js */
/* Access code, language switching, scroll animations, lightbox */

(function(){
  // ============== ACCESS CODE ==============
  const CODE = "ICEFORCE2026";

  function applyLang(l){
    document.documentElement.setAttribute('lang', l);
    document.documentElement.setAttribute('data-lang', l);
    const dict = window.T[l];
    if(!dict) return;
    document.querySelectorAll('[data-t]').forEach(el => {
      const k = el.getAttribute('data-t');
      if(dict[k] !== undefined) el.innerHTML = dict[k];
    });
    document.querySelectorAll('[data-ph]').forEach(el => {
      const k = el.getAttribute('data-ph');
      if(dict[k] !== undefined) el.setAttribute('placeholder', dict[k]);
    });
    document.querySelectorAll('[data-l]').forEach(b => {
      b.classList.toggle('on', b.getAttribute('data-l') === l);
    });
    try{ localStorage.setItem('iceforce_lang', l); }catch(e){}
  }
  window.setLang = applyLang;

  function tryGate(){
    const v = document.getElementById('pw').value.trim();
    if(v.toUpperCase() === CODE){
      document.getElementById('gate').classList.add('hidden');
      document.getElementById('site').classList.add('show');
      document.body.style.overflow = 'auto';
      try{ sessionStorage.setItem('iceforce_unlocked','1'); }catch(e){}
      setTimeout(() => { document.getElementById('gate').style.display = 'none'; }, 650);
    } else {
      const cur = document.documentElement.getAttribute('data-lang') || 'sk';
      document.getElementById('gateErr').textContent = (window.T[cur] && window.T[cur].gate_err) || 'Invalid code.';
      document.getElementById('pw').value = '';
    }
  }
  window.tryGate = tryGate;

  // ============== INIT ==============
  document.addEventListener('DOMContentLoaded', function(){
    // language: stored preference or default sk
    let savedLang = 'sk';
    try{ savedLang = localStorage.getItem('iceforce_lang') || 'sk'; }catch(e){}
    applyLang(savedLang);

    // if previously unlocked in this session, skip gate
    let unlocked = false;
    try{ unlocked = sessionStorage.getItem('iceforce_unlocked') === '1'; }catch(e){}
    if(unlocked){
      document.getElementById('gate').style.display = 'none';
      document.getElementById('site').classList.add('show');
      document.body.style.overflow = 'auto';
    } else {
      document.body.style.overflow = 'hidden';
    }

    // password input
    const pw = document.getElementById('pw');
    if(pw){
      pw.addEventListener('keydown', e => { if(e.key === 'Enter') tryGate(); });
    }

    // burger menu
    const burger = document.querySelector('.burger');
    const links = document.querySelector('.nav-links');
    if(burger){
      burger.addEventListener('click', () => links.classList.toggle('open'));
      links.addEventListener('click', e => {
        if(e.target.tagName === 'A') links.classList.remove('open');
      });
    }

    // reveal on scroll
    const io = new IntersectionObserver(entries => {
      entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('in'); });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    // nav auto-hide on scroll down
    let last = 0;
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      const n = document.querySelector('nav');
      if(y > last && y > 200) n.style.transform = 'translateY(-100%)';
      else n.style.transform = 'none';
      last = y;
    });

    // lightbox for slide images and gallery
    const lb = document.getElementById('lightbox');
    document.querySelectorAll('.zoomable').forEach(im => {
      im.addEventListener('click', () => {
        document.getElementById('lbImg').src = im.getAttribute('data-full') || im.src;
        lb.classList.add('open');
      });
    });
    if(lb){
      lb.addEventListener('click', e => { if(e.target.id === 'lightbox' || e.target.classList.contains('lb-close')) lb.classList.remove('open'); });
    }
  });
})();
