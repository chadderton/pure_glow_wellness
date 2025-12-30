<?php
/**
 * Header Partial
 *
 * Expects:
 * - $site['nav'] (array): Navigation items with 'label' and 'href'
 * - $site['meta']['title_default'] (string): For logo alt text
 */
?>
<header class="site-header">
    <div class="container header-container">
        <div class="logo">
            <a href="./" class="header-logo-link">
                <img src="assets/images/brand/text_logo.svg"
                    alt="<?= htmlspecialchars($site['meta']['title_default']) ?>">
            </a>
        </div>
        <button class="mobile-menu-toggle" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <nav class="main-nav">
            <ul>
                <?php foreach ($site['nav'] as $item): ?>
                    <li>
                        <a href="<?= htmlspecialchars($item['href']) ?>">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
<main>