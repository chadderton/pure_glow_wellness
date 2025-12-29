<?php
// templates/components/retreat.php
?>
<section class="retreat-section" id="retreat" style="padding: 4rem 1rem; background-color: var(--pgw-cream);">
    <div class="container">
        <div class="retreat-layout" style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">

            <?php
            $retreatImgInside = $data['retreat']['image'] ?? '';
            $retreatImgOutside = $data['retreat']['image_outside'] ?? '';

            if ($retreatImgInside):
                $insideSrcset = get_srcset($retreatImgInside);
                $outsideSrcset = $retreatImgOutside ? get_srcset($retreatImgOutside) : '';
                ?>

                <div class="retreat-images-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; width: 100%; max-width: 1000px;">
                    <!-- Inside Image -->
                    <div class="retreat-image-item">
                        <img src="<?= htmlspecialchars($retreatImgInside) ?>"
                            srcset="<?= htmlspecialchars($insideSrcset) ?>" sizes="(max-width: 768px) 100vw, 50vw"
                            alt="<?= htmlspecialchars($data['retreat']['image_alt'] ?? 'The Retreat inside') ?>"
                            style="width: 100%; height: auto; border-radius: 8px; object-fit: cover; aspect-ratio: 4/3;">
                    </div>

                    <?php if ($retreatImgOutside): ?>
                        <!-- Outside Image -->
                        <div class="retreat-image-item">
                            <img src="<?= htmlspecialchars($retreatImgOutside) ?>"
                                srcset="<?= htmlspecialchars($outsideSrcset) ?>" sizes="(max-width: 768px) 100vw, 50vw"
                                alt="<?= htmlspecialchars($data['retreat']['image_outside_alt'] ?? 'The Retreat outside') ?>"
                                style="width: 100%; height: auto; border-radius: 8px; object-fit: cover; aspect-ratio: 4/3;">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="retreat-content" style="max-width: 700px; text-align: center;">
                <h2 style="margin-bottom: 1rem; font-family: var(--font-heading); color: var(--pgw-primary);">
                    <?= htmlspecialchars($data['retreat']['title'] ?? 'The Retreat') ?>
                </h2>
                <p style="margin-bottom: 1.5rem; font-size: 1.1rem; line-height: 1.7;">
                    <?= nl2br(htmlspecialchars($data['retreat']['description'] ?? '')) ?>
                </p>

                <?php if (!empty($data['retreat']['quote'])): ?>
                    <div class="retreat-quote" style="font-style: italic; color: var(--pgw-dark); font-weight: 500;">
                        <?= htmlspecialchars($data['retreat']['quote']) ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>