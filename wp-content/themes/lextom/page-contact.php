<?php
/**
 * Template Name: LeXtom — Contact
 * Template Post Type: page
 *
 * @package LeXtom
 */

get_header();
$img = LEXTOM_URI . '/assets/images/';
?>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Outfit:wght@200;300;400;500;600;700&family=Bebas+Neue&display=swap" rel="stylesheet">

<style>
.contact-page{
  --navy:#0D1E35;--navy-2:#16304F;
  --zred:#C0292B;--zred-2:#E8393C;
  --zgold:#B8963E;--zgold-2:#D4AF55;
  --zdark:#060F1A;--zmuted:#5A7089;
  --f-display:'Cormorant Garamond',Georgia,serif;
  --f-body:'Outfit',system-ui,sans-serif;
  --f-mono:'Bebas Neue','Outfit',sans-serif;
  --pad-x:clamp(1.25rem,5vw,4.5rem);
  font-family:var(--f-body);color:#fff;line-height:1.7;font-weight:300;font-size:16px;
  -webkit-font-smoothing:antialiased;
}
.contact-page *{box-sizing:border-box;}
.contact-page .eyebrow{display:inline-flex;align-items:center;gap:.85rem;font-family:var(--f-body);font-weight:500;font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;color:var(--zgold-2);}
.contact-page .eyebrow::before{content:'';width:2.5rem;height:1px;background:var(--zgold);}

.contact-page .zcontact{background:var(--navy);color:#fff;padding:6rem var(--pad-x);}
.contact-page .zcontact__inner{max-width:680px;margin:0 auto;}
.contact-page .zcontact__head{text-align:center;margin-bottom:3rem;}
.contact-page .zcontact__h{font-family:var(--f-display);font-weight:500;font-size:clamp(1.8rem,3.5vw,2.8rem);line-height:1.1;color:#fff;margin:1rem 0;}
.contact-page .zcontact__h em{font-style:italic;color:var(--zgold-2);}
.contact-page .zcontact__sub{color:rgba(255,255,255,.6);font-size:.95rem;max-width:50ch;margin:0 auto;}

.contact-page .zform{display:flex;flex-direction:column;gap:1.25rem;}
.contact-page .zfield{display:flex;flex-direction:column;gap:.5rem;}
.contact-page .zfield label{font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;color:var(--zgold-2);font-weight:500;font-family:var(--f-body);}
.contact-page .zfield input,
.contact-page .zfield textarea{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.15);color:#fff;padding:1rem 1.1rem;font-size:1rem;font-weight:300;font-family:var(--f-body);transition:border-color .25s,background .25s;border-radius:0;width:100%;}
.contact-page .zfield input:focus,
.contact-page .zfield textarea:focus{outline:none;border-color:var(--zgold);background:rgba(255,255,255,.07);}
.contact-page .zfield textarea{min-height:140px;resize:vertical;}
.contact-page .zfield input::placeholder,
.contact-page .zfield textarea::placeholder{color:rgba(255,255,255,.3);}

.contact-page .zform__actions{margin-top:1rem;display:flex;justify-content:space-between;align-items:center;gap:1.5rem;flex-wrap:wrap;}
.contact-page .zform__legal{font-size:.7rem;color:rgba(255,255,255,.45);max-width:32ch;}
.contact-page .zform__msg{margin-top:1rem;padding:1rem 1.2rem;font-size:.88rem;display:none;border-left:3px solid;}
.contact-page .zform__msg.ok{display:block;background:rgba(184,150,62,.1);border-color:var(--zgold);color:var(--zgold-2);}
.contact-page .zform__msg.err{display:block;background:rgba(192,41,43,.1);border-color:var(--zred);color:var(--zred-2);}

.contact-page .zbtn{display:inline-flex;align-items:center;gap:.85rem;padding:1.05rem 1.85rem;font-family:var(--f-body);font-size:.74rem;font-weight:500;letter-spacing:.22em;text-transform:uppercase;transition:all .35s ease;cursor:pointer;border:none;background:var(--zred);color:#fff;}
.contact-page .zbtn:hover{background:var(--zred-2);transform:translateY(-2px);box-shadow:0 12px 30px rgba(192,41,43,.35);}
.contact-page .zbtn__arrow{transition:transform .35s;display:inline-block;}
.contact-page .zbtn:hover .zbtn__arrow{transform:translateX(5px);}

.contact-page .zcontact__direct{margin-top:3rem;padding-top:2.5rem;border-top:1px solid rgba(255,255,255,.1);display:grid;grid-template-columns:1fr;gap:1.5rem;text-align:center;}
@media(min-width:600px){.contact-page .zcontact__direct{grid-template-columns:1fr 1fr;text-align:left;}}
.contact-page .zcontact__direct-label{font-size:.65rem;letter-spacing:.25em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:.4rem;font-family:var(--f-body);}
.contact-page .zcontact__direct-val{font-family:var(--f-display);font-size:1.15rem;color:#fff;}
.contact-page .zcontact__direct-val a{color:#fff;text-decoration:none;}
.contact-page .zcontact__direct-val a:hover{color:var(--zgold-2);}

.contact-page .zfooter{background:var(--zdark);color:rgba(255,255,255,.5);padding:2.5rem var(--pad-x);}
.contact-page .zfooter__inner{max-width:1360px;margin:0 auto;display:flex;justify-content:space-between;flex-wrap:wrap;gap:1.5rem;align-items:center;font-size:.75rem;letter-spacing:.05em;}
.contact-page .zfooter__brand{display:flex;align-items:center;gap:.75rem;color:#fff;}
.contact-page .zfooter__brand-logo{background:#fff;padding:4px;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;}
.contact-page .zfooter__brand-logo img{width:28px;height:28px;object-fit:contain;}
.contact-page .zfooter__brand-text{font-family:var(--f-mono);letter-spacing:.3em;font-size:.85rem;}
.contact-page .zfooter__legal{font-size:.7rem;color:rgba(255,255,255,.35);}
</style>

<div class="contact-page">

<!-- CONTACT -->
<section class="zcontact">
  <div class="zcontact__inner">
    <div class="zcontact__head">
      <div class="eyebrow" style="justify-content:center" data-sk="KONTAKT" data-en="CONTACT">CONTACT</div>
      <h2 class="zcontact__h"><span data-sk="Začnite" data-en="Begin the">Begin the</span> <em data-sk="konverzáciu." data-en="conversation.">conversation.</em></h2>
      <p class="zcontact__sub" data-sk="Tri polia. Bez zbytočností. Odpovieme do jedného pracovného dňa s ďalšími krokmi." data-en="Three fields. No friction. We respond within one business day with the next steps.">Three fields. No friction. We respond within one business day with the next steps.</p>
    </div>
    <form class="zform" id="contactForm" novalidate>
      <div class="zfield"><label for="cName" data-sk="Meno" data-en="Name">Name</label><input id="cName" name="name" type="text" required autocomplete="name" /></div>
      <div class="zfield"><label for="cEmail" data-sk="Email" data-en="Email">Email</label><input id="cEmail" name="email" type="email" required autocomplete="email" /></div>
      <div class="zfield"><label for="cMsg" data-sk="Správa" data-en="Message">Message</label><textarea id="cMsg" name="message" required></textarea></div>
      <div class="zform__actions">
        <p class="zform__legal" data-sk="Odoslaním súhlasíte s prijímaním dôverných investičných materiálov. Vaše kontaktné údaje nezdieľame s tretími stranami." data-en="By submitting, you agree to receive confidential investment materials. We do not share contact data with third parties.">By submitting, you agree to receive confidential investment materials. We do not share contact data with third parties.</p>
        <button type="submit" class="zbtn"><span data-sk="Odoslať požiadavku" data-en="Send request">Send request</span> <span class="zbtn__arrow">&rarr;</span></button>
      </div>
      <div class="zform__msg" id="formMsg"></div>
    </form>
    <div class="zcontact__direct">
      <div><div class="zcontact__direct-label" data-sk="Priamy kontakt" data-en="Direct contact">Direct contact</div><div class="zcontact__direct-val"><a href="mailto:info@lextom.sk">info@lextom.sk</a></div></div>
      <div><div class="zcontact__direct-label" data-sk="Tento projekt" data-en="This project">This project</div><div class="zcontact__direct-val"><a href="/development">www.lextom.sk/development</a></div></div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="zfooter">
  <div class="zfooter__inner">
    <div class="zfooter__brand">
      <span class="zfooter__brand-logo"><img src="<?php echo esc_url( $img . 'logo.png' ); ?>" alt="LeXtom s.r.o." /></span>
      <span class="zfooter__brand-text">VIP CARE TECH</span>
    </div>
    <div class="zfooter__legal">&copy; 2026 LeXtom s.r.o. &middot; Liptovsk&yacute; Mikul&aacute;&scaron;, Slovak Republic &middot; <span data-sk="Investorsk&yacute; n&aacute;hľad &middot; D&ocirc;vern&eacute;" data-en="Investor preview &middot; Confidential">Investor preview &middot; Confidential</span></div>
  </div>
</footer>

</div><!-- /.contact-page -->

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();
  var f = e.target;
  var msg = document.getElementById('formMsg');
  msg.className = 'zform__msg'; msg.textContent = '';
  var lang = localStorage.getItem('lextom_lang') || 'sk';
  var data = { name: f.name.value.trim(), email: f.email.value.trim(), message: f.message.value.trim() };
  if (!data.name || !data.email || !data.message) {
    msg.className = 'zform__msg err';
    msg.textContent = lang === 'sk' ? 'Prosím vyplňte všetky tri polia.' : 'Please fill in all three fields.';
    return;
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
    msg.className = 'zform__msg err';
    msg.textContent = lang === 'sk' ? 'Neplatný email.' : 'Invalid email.';
    return;
  }
  fetch('/development/contact.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  })
  .then(function(r) { return r.ok ? r.json().catch(function() { return {}; }) : Promise.reject(); })
  .then(function() {
    msg.className = 'zform__msg ok';
    msg.textContent = lang === 'sk' ? 'Ďakujeme. Odpovieme do jedného pracovného dňa.' : 'Thank you. We will respond within one business day.';
    f.reset();
  })
  .catch(function() {
    msg.className = 'zform__msg ok';
    msg.textContent = lang === 'sk' ? 'Ďakujeme. Vaša požiadavka bola zaznamenaná.' : 'Thank you. Your request has been recorded.';
    f.reset();
  });
});
</script>

<?php get_footer(); ?>
