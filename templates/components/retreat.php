<?php
// templates/components/retreat.php
?>
<section class="retreat-section" id="retreat">
    <div class="container">
        <div class="retreat-layout">

            <?php
            $retreatImgInside = $data['retreat']['image'] ?? '';
            $retreatImgOutside = $data['retreat']['image_outside'] ?? '';

            if ($retreatImgInside):
                $insideSrcset = get_srcset($retreatImgInside);
                $outsideSrcset = $retreatImgOutside ? get_srcset($retreatImgOutside) : '';
                ?>

                <div class="retreat-images-grid">
                    <!-- Inside Image -->
                    <div class="retreat-image-item">
                        <img src="<?= htmlspecialchars($retreatImgInside) ?>"
                            srcset="<?= htmlspecialchars($insideSrcset) ?>" sizes="(max-width: 768px) 100vw, 50vw"
                            alt="<?= htmlspecialchars($data['retreat']['image_alt'] ?? 'The Retreat inside') ?>">
                    </div>

                    <?php if ($retreatImgOutside): ?>
                        <!-- Outside Image -->
                        <div class="retreat-image-item">
                            <img src="<?= htmlspecialchars($retreatImgOutside) ?>"
                                srcset="<?= htmlspecialchars($outsideSrcset) ?>" sizes="(max-width: 768px) 100vw, 50vw"
                                alt="<?= htmlspecialchars($data['retreat']['image_outside_alt'] ?? 'The Retreat outside') ?>">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="retreat-content">
                <h2><?= htmlspecialchars($data['retreat']['title'] ?? 'The Retreat') ?></h2>
                <p><?= nl2br(htmlspecialchars($data['retreat']['description'] ?? '')) ?></p>

                <?php if (!empty($data['retreat']['quote'])): ?>
                    <div class="retreat-quote">
                        <?= htmlspecialchars($data['retreat']['quote']) ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>