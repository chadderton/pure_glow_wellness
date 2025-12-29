<?php
// session_start();
require_once 'functions.php';

$preview = isset($_GET['preview']);
$file = $preview ? "content/draft.json" : "content/data.json";
$data = json_decode(file_get_contents($file), true);

// Social Media Configuration (pulled from CMS data)
$PGW_INSTAGRAM_URL = $data['social']['instagram'] ?? "https://instagram.com";
$PGW_FACEBOOK_PAGE_URL = $data['social']['facebook'] ?? "https://facebook.com";
$PGW_MESSENGER_URL = $data['social']['messenger'] ?? "https://m.me";

// Page-specific SEO
$pageTitle = "About Caroline | " . ($data['settings']['site_title'] ?? 'Pure Glow Wellness');
$pageDescription = "Meet Caroline, the founder of Pure Glow Wellness in Marple. Read her story from breast cancer survivor to skin and wellbeing therapist.";
?>

<?php include "templates/header.php"; ?>

<nav aria-label="breadcrumb" style="padding: 1rem 0; background-color: var(--pgw-cream); font-size: 0.9rem;">
    <div class="container">
        <a href="./" style="color: var(--pgw-primary); text-decoration: none;">Home</a>
        <span style="margin: 0 0.5rem; color: var(--pgw-accent);">/</span>
        <span aria-current="page" style="color: var(--pgw-text);">My Story</span>
    </div>
</nav>

<div class="container" style="padding: 4rem 1rem; max-width: 1000px;">
    <div class="about-page-layout">

        <div class="about-header">
            <h1 style="margin-bottom: 1rem;"><?= htmlspecialchars($data['about']['title'] ?? 'About Me') ?></h1>
        </div>

        <div class="about-content">
            <?php if (!empty($data['about']['portrait'])):
                $portraitImg = $data['about']['portrait'];
                $portraitSrcset = get_srcset($portraitImg);
                ?>
                <div class="about-image-full">
                    <img src="<?= htmlspecialchars($portraitImg) ?>" srcset="<?= htmlspecialchars($portraitSrcset) ?>"
                        sizes="(max-width: 768px) 100vw, 400px"
                        alt="<?= htmlspecialchars($data['about']['portrait_alt'] ?? 'Caroline') ?>">
                </div>
            <?php endif; ?>

            <div class="about-text-full">
                <?php
                // Use full_bio if available, otherwise fallback to body (legacy)
                $fullText = $data['about']['full_bio'] ?? ($data['about']['body'] ?? '');
                $paragraphs = explode("\n\n", $fullText);
                foreach ($paragraphs as $p):
                    if (trim($p)):
                        ?>
                        <p style="margin-bottom: 1.5rem; line-height: 1.8; font-size: 1.1rem;">
                            <?= nl2br(htmlspecialchars(trim($p))) ?>
                        </p>
                        <?php
                    endif;
                endforeach;
                ?>

                <?php if (!empty($data['about']['closing_line'])): ?>
                    <div class="about-closing" style="margin-top: 2rem; font-style: italic;">
                        <p><strong><?= htmlspecialchars($data['about']['closing_line']) ?></strong></p>
                    </div>
                <?php endif; ?>

                <div style="margin-top: 3rem; text-align: center;">
                    <a href="./#contact" class="btn btn-primary">Book an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "templates/footer.php"; ?>