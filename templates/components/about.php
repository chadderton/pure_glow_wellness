<section id="about" class="about-section fade-in-section">
    <div class="container about-container">
        <div class="about-image">
            <?php if (!empty($data['about']['portrait'])): 
                $portraitImg = $data['about']['portrait'];
                $portraitSrcset = get_srcset($portraitImg);
            ?>
                <img src="<?= htmlspecialchars($portraitImg) ?>" 
                     srcset="<?= htmlspecialchars($portraitSrcset) ?>"
                     sizes="(max-width: 768px) 100vw, 50vw"
                     alt="<?= htmlspecialchars($data['about']['portrait_alt'] ?? 'Caroline') ?>">
            <?php endif; ?>
        </div>

        <div class="about-text">
            <h2><?= htmlspecialchars($data['about']['title'] ?? '') ?></h2>
            <div class="body-text">
                <?= nl2br(htmlspecialchars($data['about']['body'] ?? '')) ?>
            </div>

            <?php if (!empty($data['about']['quote'])): ?>
            <div class="callout-panel">
                <p>“<?= htmlspecialchars($data['about']['quote']) ?>”</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (!empty($data['about']['journey_title']) || !empty($data['about']['journey_body'])): ?>
    <div class="container journey-container fade-in-section">
        <h3><?= htmlspecialchars($data['about']['journey_title'] ?? '') ?></h3>
        <div class="journey-body">
            <?= nl2br(htmlspecialchars($data['about']['journey_body'] ?? '')) ?>
        </div>
    </div>
    <?php endif; ?>
</section>
