<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($pageTitle ?? $data['settings']['site_title'] ?? 'Pure Glow Wellness') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription ?? $data['settings']['meta_description'] ?? '') ?>">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? $data['settings']['site_title'] ?? 'Pure Glow Wellness') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription ?? $data['settings']['meta_description'] ?? '') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.mthstaging.co.uk/pureglow/">
    
    <?php 
    $og_image_path = $data['settings']['og_image'] ?? 'assets/images/hero/hero_image-1200w.webp';
    // Ensure we have a full URL for OG tags
    $og_image_url = strpos($og_image_path, 'http') === 0 
        ? $og_image_path 
        : 'https://www.mthstaging.co.uk/pureglow/' . ltrim($og_image_path, '/');
    ?>
    <meta property="og:image" content="<?= htmlspecialchars($og_image_url) ?>">
    <meta property="og:image:alt" content="Pure Glow Wellness in Marple">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Canonical & Favicon -->
    <link rel="canonical" href="https://www.mthstaging.co.uk/pureglow/">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Pure Glow Wellness",
      "image": "https://www.mthstaging.co.uk/pureglow/assets/images/brand/text_logo.svg",
      "description": <?= json_encode($data['settings']['meta_description'] ?? '', JSON_UNESCAPED_SLASHES) ?>,
      "url": "https://www.mthstaging.co.uk/pureglow/",
      "telephone": "+447504800028",
      "email": <?= json_encode($data['contact']['email'] ?? '', JSON_UNESCAPED_SLASHES) ?>,
      "sameAs": [
        <?= json_encode($PGW_FACEBOOK_PAGE_URL, JSON_UNESCAPED_SLASHES) ?>,
        <?= json_encode($PGW_INSTAGRAM_URL, JSON_UNESCAPED_SLASHES) ?>
      ],
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Marple",
        "addressRegion": "Greater Manchester",
        "addressCountry": "UK"
      },
      "priceRange": "££"
    }
    </script>

    <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime('assets/css/style.css') ?>">
    <style>
        :root {
            --pgw-primary: <?= htmlspecialchars($data['design']['primary'] ?? '#9A5B48') ?>;
            --pgw-accent: <?= htmlspecialchars($data['design']['accent'] ?? '#C1A59B') ?>;
            --pgw-cream: <?= htmlspecialchars($data['design']['cream'] ?? '#FFF9F5') ?>;
            --pgw-blush: <?= htmlspecialchars($data['design']['blush'] ?? '#D8A89F') ?>;
            --pgw-dark: <?= htmlspecialchars($data['design']['dark'] ?? '#5A443C') ?>;
            --pgw-text: <?= htmlspecialchars($data['design']['text'] ?? '#4A3C36') ?>;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="site-header">
        <div class="container header-container">
            <div class="logo">
                <a href="index.php" class="header-logo-link">
                    <img src="assets/images/brand/text_logo.svg" alt="Pure Glow Wellness">
                </a>
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <nav class="main-nav">
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="index.php#treatments">Treatments</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
