<section class="hero" id="hero">
    <div class="hero-bg" style="background-image:url('content/<?= htmlspecialchars($data['hero']['hero_image'] ?? '') ?>')"></div>
    <div class="container hero-content">
        <h1><?= htmlspecialchars($data['hero']['headline'] ?? '') ?></h1>
        <p><?= nl2br(htmlspecialchars($data['hero']['subheading'] ?? '')) ?></p>
    </div>
</section>
