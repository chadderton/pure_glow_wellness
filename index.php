<?php
require_once __DIR__ . '/config/bootstrap.php';
// $pageTitle comes from defaults in bootstrap/head

// ---- JSON-LD Schema ----
$schema = [
    "@context" => "https://schema.org",
    "@type" => "LocalBusiness",
    "@id" => "https://pureglowvibes.co.uk/#localbusiness",
    "name" => $site['settings']['site_title'] ?? "Pure Glow Wellness",
    "url" => "https://pureglowvibes.co.uk/",
    "description" => $site['settings']['meta_description'] ?? "Pure Glow Wellness offers gentle, tailored facials and relaxing massage in a calm private studio in Marple, Stockport.",
    "image" => "https://pureglowvibes.co.uk/" . ($site['retreat']['image'] ?? "assets/images/retreat/retreatimage-1024w.webp"),
    "address" => [
        "@type" => "PostalAddress",
        "addressLocality" => "Marple",
        "addressRegion" => "Stockport",
        "addressCountry" => "GB"
    ],
    "areaServed" => [
        "@type" => "AdministrativeArea",
        "name" => "Stockport"
    ],
    "email" => $site['contact']['email'] ?? "pureglowfacials@gmail.com",
    "priceRange" => "££",
];

// Add Social Links
$sameAs = [];
if (!empty($site['social']['facebook']))
    $sameAs[] = $site['social']['facebook'];
if (!empty($site['social']['instagram']))
    $sameAs[] = $site['social']['instagram'];
if (!empty($sameAs)) {
    $schema["sameAs"] = $sameAs;
}

// Add Services
$services = [];
if (!empty($site['treatments']['list'])) {
    foreach ($site['treatments']['list'] as $treatment) {
        $services[] = [
            "@type" => "Service",
            "name" => $treatment['title'],
            "description" => $treatment['description'] ?? ""
        ];
    }
}
if (!empty($services)) {
    $schema["serviceOffered"] = $services;
}

$extraHead = '<script type="application/ld+json">' . json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';

require PARTIALS . '/layout-top.php';
?>

<?php include "templates/home.php"; ?>

<?php require PARTIALS . '/layout-bottom.php'; ?>