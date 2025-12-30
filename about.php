<?php
require_once __DIR__ . '/config/bootstrap.php';
$pageTitle = "About Caroline | " . ($site['settings']['site_title'] ?? 'Pure Glow Wellness');
$pageDescription = "Meet Caroline, the founder of Pure Glow Wellness in Marple. Read her story from breast cancer survivor to skin and wellbeing therapist.";
require PARTIALS . '/layout-top.php';
?>

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <a href="./">Home</a>
        <span class="separator">/</span>
        <span aria-current="page">My Story</span>
    </div>
</nav>

<section class="about-page-section fade-in-section">
    <div class="container page-container max-width-1000">
        <div class="about-page-layout">

            <div class="page-header">
                <h1><?= htmlspecialchars($site['about']['title'] ?? 'About Me') ?></h1>
            </div>

            <div class="about-content">
                <?php if (!empty($site['about']['portrait'])):
                    $portraitImg = $site['about']['portrait'];
                    $portraitSrcset = get_srcset($portraitImg);
                    ?>
                    <div class="about-image-wrapper">
                        <div class="about-image-card">
                            <img src="<?= htmlspecialchars($portraitImg) ?>"
                                srcset="<?= htmlspecialchars($portraitSrcset) ?>" sizes="(max-width: 768px) 100vw, 400px"
                                alt="<?= htmlspecialchars($site['about']['portrait_alt'] ?? 'Caroline') ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="about-text-content">
                    <div class="large-text-content">
                        <?php
                        // Use full_bio if available, otherwise fallback to body (legacy)
                        $fullText = $site['about']['full_bio'] ?? ($site['about']['body'] ?? '');
                        $paragraphs = explode("\n\n", $fullText);
                        foreach ($paragraphs as $p):
                            if (trim($p)):
                                ?>
                                <p>
                                    <?= nl2br(htmlspecialchars(trim($p))) ?>
                                </p>
                                <?php
                            endif;
                        endforeach;
                        ?>

                        <?php if (!empty($site['about']['closing_line'])): ?>
                            <div class="about-closing">
                                <p><strong><?= htmlspecialchars($site['about']['closing_line']) ?></strong></p>
                            </div>
                        <?php endif; ?>

                        <div class="cta-container">
                            <a href="./#contact" class="btn btn-primary">Book an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require PARTIALS . '/layout-bottom.php'; ?>