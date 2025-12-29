<section id="about" class="about-section fade-in-section">
    <div class="container about-container">
        <div class="about-image">
            <?php if (!empty($data['about']['portrait'])):
                $portraitImg = $data['about']['portrait'];
                $portraitSrcset = get_srcset($portraitImg);
                ?>
                <img src="<?= htmlspecialchars($portraitImg) ?>" srcset="<?= htmlspecialchars($portraitSrcset) ?>"
                    sizes="(max-width: 768px) 100vw, 50vw"
                    alt="<?= htmlspecialchars($data['about']['portrait_alt'] ?? 'Caroline') ?>">
            <?php endif; ?>
        </div>

        <div class="about-text">
            <h2><?= htmlspecialchars($data['about']['title'] ?? '') ?></h2>
            <div class="body-text">
                <?php
                // Use home_summary if available, otherwise fallback to body (legacy)
                $summaryText = $data['about']['home_summary'] ?? ($data['about']['body'] ?? '');
                $paragraphs = explode("\n\n", $summaryText);
                foreach ($paragraphs as $p):
                    if (trim($p)):
                        ?>
                        <p><?= nl2br(htmlspecialchars(trim($p))) ?></p>
                    <?php
                    endif;
                endforeach;
                ?>
            </div>

            <div class="about-actions mt-3">
                <a href="about.php" class="btn btn-secondary">Read my full story</a>
            </div>
        </div>
    </div>
</section>