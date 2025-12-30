<?php
/**
 * Head Partial
 *
 * Expects:
 * - $site['meta'] (array): Default SEO values
 * - $pageTitle (string|null): Optional override
 * - $pageDescription (string|null): Optional override
 * - $canonical (string|null): Optional override
 */
$pageTitle = $pageTitle ?? $site['meta']['title_default'];
$pageDescription = $pageDescription ?? $site['meta']['description_default'];
$canonical = $canonical ?? null;
?><!doctype html>
<html lang="en">

<head>
    <meta charset="<?= htmlspecialchars($site['meta']['charset']) ?>">
    <meta name="viewport" content="<?= htmlspecialchars($site['meta']['viewport']) ?>">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <?php if ($pageDescription !== ''): ?>
        <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <?php endif; ?>

    <?php if ($canonical): ?>
        <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
    $fontsUrl = "https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap";
    ?>
    <link rel="preload" as="style" href="<?= $fontsUrl ?>">
    <link rel="stylesheet" href="<?= $fontsUrl ?>" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="<?= $fontsUrl ?>">
    </noscript>
    <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime(ROOT . '/assets/css/style.css') ?>">

    <style>
        :root {
            --pgw-primary:
                <?= htmlspecialchars($site['design']['primary'] ?? '#9A5B48') ?>
            ;
            --pgw-accent:
                <?= htmlspecialchars($site['design']['accent'] ?? '#C1A59B') ?>
            ;
            --pgw-cream:
                <?= htmlspecialchars($site['design']['cream'] ?? '#FFF9F5') ?>
            ;
            --pgw-blush:
                <?= htmlspecialchars($site['design']['blush'] ?? '#D8A89F') ?>
            ;
            --pgw-dark:
                <?= htmlspecialchars($site['design']['dark'] ?? '#5A443C') ?>
            ;
            --pgw-text:
                <?= htmlspecialchars($site['design']['text'] ?? '#4A3C36') ?>
            ;
        }
    </style>

    <?php if (isset($extraHead))
        echo $extraHead; ?>
</head>

<body>