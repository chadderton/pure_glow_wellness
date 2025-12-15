<?php
// session_start();
require_once 'functions.php';

$preview = isset($_GET['preview']);
$file = $preview ? "content/draft.json" : "content/data.json";
$data = json_decode(file_get_contents($file), true);

// Page-specific SEO
$pageTitle = "Client Reviews | " . ($data['settings']['site_title'] ?? 'Pure Glow Wellness');
$pageDescription = "Read what clients say about their experiences at Pure Glow Wellness in Marple.";
?>

<?php include "templates/header.php"; ?>

<nav aria-label="breadcrumb" style="padding: 1rem 0; background-color: var(--pgw-cream); font-size: 0.9rem;">
    <div class="container">
        <a href="./" style="color: var(--pgw-primary); text-decoration: none;">Home</a>
        <span style="margin: 0 0.5rem; color: var(--pgw-accent);">/</span>
        <span aria-current="page" style="color: var(--pgw-text);">Reviews</span>
    </div>
</nav>

<div class="container" style="padding: 4rem 1rem; max-width: 800px;">
    <div class="reviews-page-header" style="text-align: center; margin-bottom: 3rem;">
        <h1 style="margin-bottom: 1rem;">Client Reviews</h1>
        <p style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
            <?= htmlspecialchars($data['testimonials']['title'] ?? 'Kind words from my clients') ?>
        </p>
    </div>

    <div class="reviews-list" style="display: flex; flex-direction: column; gap: 2.5rem;">
        <?php
        $reviews = $data['reviews_page'] ?? [];
        foreach ($reviews as $review):
            if (empty($review['text']))
                continue;
            ?>
            <div class="review-item fade-in-section"
                style="background: var(--pgw-cream); padding: 2rem; border-radius: 8px; border-left: 4px solid var(--pgw-blush);">
                <div class="review-body" style="font-size: 1.1rem; line-height: 1.8; color: var(--pgw-text);">
                    <?= nl2br(htmlspecialchars($review['text'])) ?>
                </div>
                <div class="review-author"
                    style="margin-top: 1.5rem; font-weight: 600; color: var(--pgw-primary); display: flex; align-items: center; gap: 0.5rem;">
                    <span class="author-dash"
                        style="display: inline-block; width: 20px; height: 1px; background-color: currentColor;"></span>
                    <?= htmlspecialchars($review['author']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="reviews-cta" style="margin-top: 4rem; text-align: center;">
        <a href="./#contact" class="btn btn-primary">Book an Appointment</a>
    </div>
</div>

<?php include "templates/footer.php"; ?>