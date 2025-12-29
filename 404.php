<?php
// 404.php
// Custom Error Page
$pageTitle = "Page Not Found | Pure Glow Wellness";
$pageDescription = "The page you are looking for could not be found.";
?>

<?php include "templates/header.php"; ?>

<main>
    <section class="hero-section error-page-section">
        <div class="hero-background">
            <img src="assets/images/hero/hero_image-1600w.webp" alt="" class="hero-img">
        </div>

        <div class="hero-content fade-in-section">
            <div class="error-page-header">
                <h1>404</h1>
            </div>

            <p class="lead-line">Oops! This page seems to have wandered off.</p>

            <p class="hero-intro">
                We couldn't find the page you were looking for. It might have been moved, deleted, or never existed.
            </p>

            <a href="index.php" class="btn btn-primary mt-4">Return Home</a>
        </div>
    </section>
</main>

<?php include "templates/footer.php"; ?>