<?php
// templates/components/retreat.php
?>
<section class="retreat-section" id="retreat" style="padding: 4rem 1rem; background-color: var(--pgw-cream);">
    <div class="container">
        <div class="retreat-layout" style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">

            <?php if (!empty($data['retreat']['image'])):
                $retreatImg = $data['retreat']['image'];
                $retreatSrcset = get_srcset($retreatImg);
                ?>
                <div class="retreat-image" style="width: 100%; max-width: 800px;">
                    <img src="<?= htmlspecialchars($retreatImg) ?>" srcset="<?= htmlspecialchars($retreatSrcset) ?>"
                        sizes="(max-width: 768px) 100vw, 800px"
                        alt="<?= htmlspecialchars($data['retreat']['image_alt'] ?? 'The Retreat') ?>"
                        style="width: 100%; height: auto; border-radius: 8px;">
                </div>
            <?php endif; ?>

            <div class="retreat-content" style="max-width: 700px; text-align: center;">
                <h2 style="margin-bottom: 1rem; font-family: var(--font-heading); color: var(--pgw-primary);">
                    <?= htmlspecialchars($data['retreat']['title'] ?? 'The Retreat') ?></h2>
                <p style="margin-bottom: 1.5rem; font-size: 1.1rem; line-height: 1.7;">
                    <?= nl2br(htmlspecialchars($data['retreat']['description'] ?? '')) ?></p>

                <?php if (!empty($data['retreat']['quote'])): ?>
                    <div class="retreat-quote" style="font-style: italic; color: var(--pgw-dark); font-weight: 500;">
                        <?= htmlspecialchars($data['retreat']['quote']) ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>