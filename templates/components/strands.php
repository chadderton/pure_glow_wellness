<section class="strands-section fade-in-section" id="strands">
    <div class="container">
        <h2><?= htmlspecialchars($data['strands']['title'] ?? '') ?></h2>
        <?php if (!empty($data['strands']['note'])): ?>
            <div class="strands-note">
                <p><?= htmlspecialchars($data['strands']['note']) ?></p>
            </div>
        <?php endif; ?>
        <div class="strands-grid">
            <?php foreach ($data['strands']['cards'] as $card): ?>
                <div class="strand-card">
                    <?php if (!empty($card['icon'])): ?>
                        <img src="<?= htmlspecialchars($card['icon']) ?>" alt="" class="strand-icon">
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($card['title']) ?></h3>
                    <?php if (!empty($card['subtitle'])): ?>
                        <p class="strand-subtitle"
                            style="font-style: italic; color: var(--pgw-primary); margin-bottom: 0.5rem; font-weight: 500;">
                            <?= htmlspecialchars($card['subtitle']) ?>
                        </p>
                    <?php endif; ?>
                    <p><?= nl2br(htmlspecialchars($card['copy'])) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>