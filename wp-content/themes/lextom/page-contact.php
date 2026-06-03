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

<!-- CONTACT -->
<section class="lextom-contact">
  <div class="contact-inner">
    <div class="contact-head">
      <div class="sec-label reveal" style="justify-content:center" data-sk="Kontakt" data-en="Contact">Kontakt</div>
      <h2 class="contact-h reveal" data-sk="Začnite <em>konverzáciu.</em>" data-en="Begin the <em>conversation.</em>">Začnite <em>konverzáciu.</em></h2>
      <p class="contact-sub reveal d1" data-sk="Tri polia. Bez zbytočností. Odpovieme do jedného pracovného dňa s ďalšími krokmi." data-en="Three fields. No friction. We respond within one business day with the next steps.">Tri polia. Bez zbytočností. Odpovieme do jedného pracovného dňa s ďalšími krokmi.</p>
    </div>
    <form class="contact-form reveal d2" id="contactForm" novalidate>
      <div class="cfield">
        <label for="cName" data-sk="Meno" data-en="Name">Meno</label>
        <input id="cName" name="name" type="text" required autocomplete="name" />
      </div>
      <div class="cfield">
        <label for="cEmail" data-sk="Email" data-en="Email">Email</label>
        <input id="cEmail" name="email" type="email" required autocomplete="email" />
      </div>
      <div class="cfield">
        <label for="cMsg" data-sk="Správa" data-en="Message">Správa</label>
        <textarea id="cMsg" name="message" required></textarea>
      </div>
      <div class="contact-actions">
        <p class="contact-legal" data-sk="Odoslaním súhlasíte s prijímaním dôverných materiálov. Vaše kontaktné údaje nezdieľame s tretími stranami." data-en="By submitting, you agree to receive confidential materials. We do not share contact data with third parties.">Odoslaním súhlasíte s prijímaním dôverných materiálov. Vaše kontaktné údaje nezdieľame s tretími stranami.</p>
        <button type="submit" class="btn" data-sk="Odoslať požiadavku →" data-en="Send request →">Odoslať požiadavku →</button>
      </div>
      <div class="contact-msg" id="formMsg"></div>
    </form>
    <div class="contact-direct reveal d3">
      <div>
        <div class="contact-direct-label" data-sk="Priamy kontakt" data-en="Direct contact">Priamy kontakt</div>
        <div class="contact-direct-val"><a href="mailto:info@lextom.sk">info@lextom.sk</a></div>
      </div>
      <div>
        <div class="contact-direct-label" data-sk="Tento projekt" data-en="This project">Tento projekt</div>
        <div class="contact-direct-val"><a href="/development">www.lextom.sk/development</a></div>
      </div>
    </div>
  </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();
  var f = e.target;
  var msg = document.getElementById('formMsg');
  msg.className = 'contact-msg'; msg.textContent = '';
  var lang = localStorage.getItem('lextom_lang') || 'sk';
  var data = { name: f.name.value.trim(), email: f.email.value.trim(), message: f.message.value.trim() };
  if (!data.name || !data.email || !data.message) {
    msg.className = 'contact-msg err';
    msg.textContent = lang === 'sk' ? 'Prosím vyplňte všetky tri polia.' : 'Please fill in all three fields.';
    return;
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
    msg.className = 'contact-msg err';
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
    msg.className = 'contact-msg ok';
    msg.textContent = lang === 'sk' ? 'Ďakujeme. Odpovieme do jedného pracovného dňa.' : 'Thank you. We will respond within one business day.';
    f.reset();
  })
  .catch(function() {
    msg.className = 'contact-msg ok';
    msg.textContent = lang === 'sk' ? 'Ďakujeme. Vaša požiadavka bola zaznamenaná.' : 'Thank you. Your request has been recorded.';
    f.reset();
  });
});
</script>

<?php get_footer(); ?>
