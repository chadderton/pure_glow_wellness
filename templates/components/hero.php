<section id="home" class="hero-section">
    <div class="hero-background">
        <?php 
        $heroImg = $data['hero']['hero_image'] ?? '';
        $heroSrcset = get_srcset($heroImg);
        ?>
        <img src="<?= htmlspecialchars($heroImg) ?>" 
             srcset="<?= htmlspecialchars($heroSrcset) ?>"
             sizes="100vw"
             alt="<?= htmlspecialchars($data['hero']['hero_image_alt'] ?? 'Peaceful wellness atmosphere') ?>" 
             class="hero-img">
    </div>

    <div class="container hero-content">
        <img src="assets/images/brand/text_logo.svg" alt="Pure Glow Wellness" class="hero-logo">
        <h1><?= htmlspecialchars($data['hero']['headline'] ?? '') ?></h1>
        <p class="subheading"><?= nl2br(htmlspecialchars($data['hero']['subheading'] ?? '')) ?></p>

        <div class="hero-buttons">
            <a href="#contact" class="btn btn-primary">Get in Touch</a>
            <a href="#services" class="btn btn-secondary">Explore Services</a>
        </div>
    </div>
</section>
