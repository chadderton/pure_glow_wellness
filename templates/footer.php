</main>
<footer class="site-footer">
    <div class="container">
        <div class="social-links">
            <a class="footer-social" href="<?php echo htmlspecialchars($PGW_FACEBOOK_PAGE_URL); ?>" target="_blank"
                rel="noopener noreferrer">
                <img src="assets/images/socials/facebook_icon_white.svg" alt="" aria-hidden="true"
                    class="footer-social__icon" width="18" height="18">
                Facebook
            </a>
            <a class="footer-social" href="<?php echo htmlspecialchars($PGW_INSTAGRAM_URL); ?>" target="_blank"
                rel="noopener noreferrer">
                <img src="assets/images/socials/instagram_icon_white.svg" alt="" aria-hidden="true"
                    class="footer-social__icon" width="18" height="18">
                Instagram
            </a>
            <a class="footer-social" href="<?php echo htmlspecialchars($PGW_MESSENGER_URL); ?>" target="_blank"
                rel="noopener noreferrer">
                <img src="assets/images/socials/messenger_icon_white.svg" alt="" aria-hidden="true"
                    class="footer-social__icon" width="18" height="18">
                Messenger
            </a>
        </div>
        <p><?= htmlspecialchars($data['footer']['microcopy'] ?? 'Pure Glow Wellness • Marple, Stockport') ?></p>
        <p><a href="privacy-policy">Privacy Policy</a></p>
        <p class="designer-credit">Website designed by <a href="https://www.marpletech.co.uk" target="_blank"
                rel="noopener noreferrer">Marple Tech Help</a></p>
    </div>
</footer>
<script src="assets/js/main.js?v=<?= filemtime('assets/js/main.js') ?>"></script>
</body>

</html>