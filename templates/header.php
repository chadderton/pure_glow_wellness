<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($data['settings']['site_title'] ?? 'Pure Glow Wellness') ?></title>
    <meta name="description" content="<?= htmlspecialchars($data['settings']['meta_description'] ?? '') ?>">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="<?= htmlspecialchars($data['settings']['site_title'] ?? 'Pure Glow Wellness') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($data['settings']['meta_description'] ?? '') ?>">
    <?php if (!empty($data['settings']['og_image'])): ?>
    <meta property="og:image" content="content/<?= htmlspecialchars($data['settings']['og_image']) ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="site-header">
        <div class="container header-container">
            <div class="logo">
                <a href="index.php" class="header-logo-link">Pure Glow Wellness</a>
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <nav class="main-nav">
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#treatments">Treatments</a></li>
                    <li><a href="#benefits">Benefits</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
