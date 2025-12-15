<section id="home" class="hero-section">
    <div class="hero-background">
        <?php
        $heroImg = $data['hero']['hero_image'] ?? '';
        $heroSrcset = get_srcset($heroImg);
        ?>
        <img src="<?= htmlspecialchars($heroImg) ?>" srcset="<?= htmlspecialchars($heroSrcset) ?>" sizes="100vw"
            alt="<?= htmlspecialchars($data['hero']['hero_image_alt'] ?? 'Peaceful wellness atmosphere') ?>"
            class="hero-img">
    </div>

    <div class="container hero-content">
        <img src="assets/images/brand/text_logo.svg" alt="" aria-hidden="true" class="hero-logo">
        <h1 class="visually-hidden"><?= htmlspecialchars($data['hero']['headline'] ?? '') ?></h1>
        <p class="lead-line"><?= nl2br(htmlspecialchars($data['hero']['lead_line'] ?? '')) ?></p>

        <div class="hero-intro">
            <p><?= nl2br(htmlspecialchars($data['hero']['intro'] ?? '')) ?></p>
        </div>

        <div class="hero-buttons">
            <a href="#contact"
                class="btn btn-primary"><?= htmlspecialchars($data['hero']['primary_cta'] ?? 'Enquire now') ?></a>
            <a href="mailto:<?= htmlspecialchars($data['contact']['email'] ?? '') ?>" class="btn btn-secondary"
                target="_blank"><?= htmlspecialchars($data['hero']['secondary_cta'] ?? 'Email me') ?></a>
        </div>

        <div class="hero-showpiece">
            <p><?= htmlspecialchars($data['hero']['showpiece_line'] ?? '') ?></p>
        </div>

        <div class="hero-trust">
            <small><?= htmlspecialchars($data['hero']['mini_trust_line'] ?? '') ?></small>
        </div>
    </div>
</section>