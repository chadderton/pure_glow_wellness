<section class="pricing" id="pricing">
    <div class="container">
        <h2><?= htmlspecialchars($data['pricing']['title'] ?? '') ?></h2>
        <div class="pricing-info">
            <?= nl2br(htmlspecialchars($data['pricing']['info'] ?? '')) ?>
        </div>
    </div>
</section>
