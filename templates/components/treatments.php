<section class="treatments" id="treatments">
    <div class="container">
        <h2><?= htmlspecialchars($data['treatments']['title'] ?? '') ?></h2>
        <div class="treatments-content">
            <?= nl2br(htmlspecialchars($data['treatments']['description'] ?? '')) ?>
        </div>
    </div>
</section>
