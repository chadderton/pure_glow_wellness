<section class="treatments" id="treatments">
    <div class="container">
        <h2><?= htmlspecialchars($data['treatments']['title'] ?? '') ?></h2>
        <div class="treatments-intro">
            <p><?= nl2br(htmlspecialchars($data['treatments']['intro'] ?? '')) ?></p>

            <?php if (!empty($data['quotes']['treatments'])): ?>
                <p class="section-quote">
                    <?= htmlspecialchars($data['quotes']['treatments']) ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($data['treatments']['pricing_line'])): ?>
                <p class="pricing-line"><?= htmlspecialchars($data['treatments']['pricing_line']) ?></p>
            <?php endif; ?>

            <?php if (!empty($data['treatments']['intro_offer_text'])): ?>
                <div class="intro-offer-block">
                    <p class="intro-offer-text">
                        <?= htmlspecialchars($data['treatments']['intro_offer_text']) ?>
                    </p>
                    <a href="<?= htmlspecialchars($data['social']['messenger'] ?? '') ?>" class="btn btn-primary"
                        target="_blank" rel="noopener noreferrer">
                        <img src="assets/images/socials/messenger_icon_white.svg" alt="" width="20" height="20">
                        <?= htmlspecialchars($data['treatments']['intro_offer_cta'] ?? 'Message on Messenger') ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="treatments-grid">
            <?php
            // Check for new schema format (treatment_1_title etc)
            $hasNewFormat = false;
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($data['treatments']["treatment_{$i}_title"])) {
                    $hasNewFormat = true;
                    break;
                }
            }

            if ($hasNewFormat):
                for ($i = 1; $i <= 4; $i++):
                    $tTitle = $data['treatments']["treatment_{$i}_title"] ?? '';
                    if (!$tTitle)
                        continue;

                    $tDesc = $data['treatments']["treatment_{$i}_desc"] ?? '';
                    $tDuration = $data['treatments']["treatment_{$i}_duration"] ?? '';
                    $tPrice = $data['treatments']["treatment_{$i}_price"] ?? '';
                    $tImage = $data['treatments']["treatment_{$i}_image"] ?? '';
                    $tBenefitsTitle = $data['treatments']["treatment_{$i}_benefits_title"] ?? '';
                    $tBenefits = $data['treatments']["treatment_{$i}_benefits"] ?? [];
                    ?>
                    <div class="treatment-card fade-in-section">
                        <?php if ($tImage): ?>
                            <div class="treatment-img">
                                <img src="<?= htmlspecialchars($tImage) ?>" srcset="<?= get_srcset($tImage) ?>"
                                    sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                                    alt="<?= htmlspecialchars($tTitle) ?>">
                            </div>
                        <?php endif; ?>
                        <div class="treatment-info">
                            <h3><?= htmlspecialchars($tTitle) ?></h3>
                            <p class="duration"><?= htmlspecialchars($tDuration) ?>
                                <?= $tPrice ? ' | ' . htmlspecialchars($tPrice) : '' ?>
                            </p>
                            <p><?= nl2br(htmlspecialchars($tDesc)) ?></p>
                            <?php if (!empty($tBenefits)): ?>
                                <div class="benefits-container">
                                    <?php if ($tBenefitsTitle): ?>
                                        <p class="benefits-title"><?= htmlspecialchars($tBenefitsTitle) ?></p>
                                    <?php endif; ?>
                                    <ul class="benefits-list">
                                        <?php foreach ($tBenefits as $benefit): ?>
                                            <li><?= htmlspecialchars($benefit) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endfor;
            else:
                // Fallback to old list format
                foreach ($data['treatments']['list'] as $treatment):
                    ?>
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
                            <?php if (!empty($treatment['benefits'])): ?>
                                <div class="benefits-container">
                                    <?php if (!empty($treatment['benefits_title'])): ?>
                                        <p class="benefits-title"><?= htmlspecialchars($treatment['benefits_title']) ?></p>
                                    <?php endif; ?>
                                    <ul class="benefits-list">
                                        <?php foreach ($treatment['benefits'] as $benefit): ?>
                                            <li><?= htmlspecialchars($benefit) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
        </div>
    </div>
</section>