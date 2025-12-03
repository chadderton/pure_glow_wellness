<section class="about" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h2><?= htmlspecialchars($data['about']['title'] ?? '') ?></h2>
                <div class="body-text">
                    <?= nl2br(htmlspecialchars($data['about']['body'] ?? '')) ?>
                </div>
            </div>
            <div class="about-image">
                <?php if (!empty($data['about']['portrait'])): ?>
                    <img src="content/<?= htmlspecialchars($data['about']['portrait']) ?>" alt="Caroline">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
