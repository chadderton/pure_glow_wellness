<section class="social-follow fade-in-section" aria-labelledby="follow-title">
  <div class="container">
    <h2 id="follow-title">Follow along</h2>
    <p>I share skincare tips, availability updates, and real client results (with permission) on Facebook and Instagram.
    </p>

    <div class="social-buttons">
      <a class="social-btn social-btn--messenger" href="<?= htmlspecialchars($data['social']['messenger'] ?? '') ?>"
        target="_blank" rel="noopener noreferrer">
        <img src="assets/images/socials/messenger_icon_white.svg" alt="" aria-hidden="true" class="social-icon"
          width="20" height="20">
        Message me on Facebook
      </a>

      <a class="social-btn social-btn--instagram" href="<?= htmlspecialchars($data['social']['instagram'] ?? '') ?>"
        target="_blank" rel="noopener noreferrer">
        <img src="assets/images/socials/instagram_icon_white.svg" alt="" aria-hidden="true" class="social-icon"
          width="20" height="20">
        Follow on Instagram
      </a>

      <a class="social-btn social-btn--facebook" href="<?= htmlspecialchars($data['social']['facebook'] ?? '') ?>"
        target="_blank" rel="noopener noreferrer">
        <img src="assets/images/socials/facebook_icon_white.svg" alt="" aria-hidden="true" class="social-icon"
          width="20" height="20">
        Find me on Facebook
      </a>
    </div>

    <p class="social-note"><strong>Quick question?</strong> Messaging is always welcome — I’ll reply with availability
      and a recommendation.</p>
  </div>
</section>