<section class="treatments" id="treatments">
    <div class="container">
        <h2><?= htmlspecialchars($data['treatments']['title'] ?? '') ?></h2>
        <div class="treatments-content">
            <?= nl2br(htmlspecialchars($data['treatments']['description'] ?? '')) ?>
        </div>

        <div class="treatments-grid">
            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="assets/images/services/facial.webp" 
                         srcset="<?= get_srcset('assets/images/services/facial.webp') ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="Facial treatments">
                </div>
                <div class="treatment-info">
                    <h3>Relaxing Facials</h3>
                    <p>Calming, restorative facials designed for radiance, confidence, and deep relaxation.</p>
                </div>
            </div>

            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="assets/images/services/indian_head_massage.webp" 
                         srcset="<?= get_srcset('assets/images/services/indian_head_massage.webp') ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="Head massage treatments">
                </div>
                <div class="treatment-info">
                    <h3>Indian Head Massage</h3>
                    <p>A soothing treatment that eases tension, supports relaxation, and restores balance.</p>
                </div>
            </div>

            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="assets/images/services/skincare.webp" 
                         srcset="<?= get_srcset('assets/images/services/skincare.webp') ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="Skincare consultations">
                </div>
                <div class="treatment-info">
                    <h3>Natural Skincare Support</h3>
                    <p>Advice and personalised guidance on gentle, skin-friendly routines.</p>
                </div>
            </div>

            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="assets/images/services/corporate_wellness.webp" 
                         srcset="<?= get_srcset('assets/images/services/corporate_wellness.webp') ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="Corporate wellness">
                </div>
                <div class="treatment-info">
                    <h3>Corporate Wellness Days</h3>
                    <p>Workplace facial sessions, wellbeing experiences, and calming treatments for teams.</p>
                </div>
            </div>

            <div class="treatment-card fade-in-section">
                <div class="treatment-img">
                    <img src="assets/images/services/personal_training.webp" 
                         srcset="<?= get_srcset('assets/images/services/personal_training.webp') ?>"
                         sizes="(max-width: 600px) 100vw, (max-width: 900px) 50vw, 33vw"
                         alt="Women's PT training">
                </div>
                <div class="treatment-info">
                    <h3>Future: Women's PT</h3>
                    <p>Strength and wellbeing training tailored for menopausal and mid-life women.</p>
                </div>
            </div>
        </div>
    </div>
</section>
