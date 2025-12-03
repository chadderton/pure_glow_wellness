<section class="treatments" id="treatments">
    <div class="container">
        <h2><?= htmlspecialchars($data['treatments']['title'] ?? '') ?></h2>
        <div class="treatments-intro">
            <p><?= nl2br(htmlspecialchars($data['treatments']['intro'] ?? '')) ?></p>
            <?php if (!empty($data['treatments']['pricing_line'])): ?>
            <p class="pricing-line"><?= htmlspecialchars($data['treatments']['pricing_line']) ?></p>
            <?php endif; ?>
        </div>

        <div class="treatments-grid">
            <?php foreach ($data['treatments']['list'] as $treatment): ?>
            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="<?= htmlspecialchars($treatment['image']) ?>" 
                         srcset="<?= get_srcset($treatment['image']) ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="<?= htmlspecialchars($treatment['title']) ?>">
                </div>
                <div class="treatment-info">
                    <h3><?= htmlspecialchars($treatment['title']) ?></h3>
                    <p class="duration"><?= htmlspecialchars($treatment['duration']) ?></p>
                    <p><?= nl2br(htmlspecialchars($treatment['description'])) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
