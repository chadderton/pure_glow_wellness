<?php
/**
 * Footer Partial
 *
 * Expects:
 * - $site['social'] (array): Social media URLs
 * - $site['footer'] (array): Optional microcopy
 */
?>
</main>
<footer class="site-footer">
    <div class="container">
        <div class="social-links">
            <?php
            $social = $site['social'] ?? [];
            $links = [
                'Facebook' => ['url' => $social['facebook'] ?? '', 'icon' => 'assets/images/socials/facebook_icon_white.svg'],
                'Instagram' => ['url' => $social['instagram'] ?? '', 'icon' => 'assets/images/socials/instagram_icon_white.svg'],
                'Messenger' => ['url' => $social['messenger'] ?? '', 'icon' => 'assets/images/socials/messenger_icon_white.svg'],
            ];
            ?>

            <?php foreach ($links as $label => $data): ?>
                <?php if (!empty($data['url'])): ?>
                    <a class="footer-social" href="<?= htmlspecialchars($data['url']) ?>" target="_blank"
                        rel="noopener noreferrer">
                        <img src="<?= htmlspecialchars($data['icon']) ?>" alt="" aria-hidden="true" class="footer-social__icon"
                            width="18" height="18">
                        <?= htmlspecialchars($label) ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <p><?= htmlspecialchars($site['footer']['microcopy'] ?? 'Pure Glow Wellness • Marple, Stockport') ?></p>
        <p><a href="privacy-policy">Privacy Policy</a></p>
        <p class="designer-credit">Website designed by <a href="https://www.marpletech.co.uk" target="_blank"
                rel="noopener noreferrer">Marple Tech Help</a></p>
    </div>
</footer>