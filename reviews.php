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

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <a href="./">Home</a>
        <span class="separator">/</span>
        <span aria-current="page">Reviews</span>
    </div>
</nav>

<section class="reviews-section">
    <div class="container reviews-container">
        <div class="reviews-page-header">
            <h1>Client Reviews</h1>
            <p>
                <?= htmlspecialchars($data['testimonials']['title'] ?? 'Kind words from my clients') ?>
            </p>
        </div>

        <div class="reviews-list">
            <?php
            $reviews = $data['reviews_page'] ?? [];
            foreach ($reviews as $review):
                if (empty($review['text']))
                    continue;
                ?>
                <div class="testimonial-card review-card fade-in-section">
                    <div class="review-body">
                        <?= nl2br(htmlspecialchars($review['text'])) ?>
                    </div>
                    <div class="review-author">
                        <span class="author-dash"></span>
                        <?= htmlspecialchars($review['author']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="reviews-cta">
            <a href="./#contact" class="btn btn-primary">Book an Appointment</a>
        </div>
    </div>
</section>

<?php include "templates/footer.php"; ?>