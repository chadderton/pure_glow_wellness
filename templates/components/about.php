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
                <?php 
                $paragraphs = explode("\n\n", $data['about']['body'] ?? '');
                foreach ($paragraphs as $p): 
                    if (trim($p)):
                ?>
                    <p><?= nl2br(htmlspecialchars(trim($p))) ?></p>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>

            <?php if (!empty($data['about']['closing_line'])): ?>
            <div class="about-closing">
                <p><strong><?= htmlspecialchars($data['about']['closing_line']) ?></strong></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
