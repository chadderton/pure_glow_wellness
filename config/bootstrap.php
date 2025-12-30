<?php
declare(strict_types=1);

// ---- Guard: Prevent double bootstrap ----
defined('BOOTSTRAPPED') && exit('Bootstrap loaded twice');
define('BOOTSTRAPPED', true);

// ---- Environment: dev or prod ----
// Defaults to 'dev'. Set APP_ENV=prod in environment for live.
define('ENV', getenv('APP_ENV') ?: 'dev');

// ---- Paths (absolute) ----
define('ROOT', dirname(__DIR__));              // /config is one level below root
define('CONFIG', ROOT . '/config');
define('PARTIALS', ROOT . '/partials');

// ---- Error reporting ----
if (ENV === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// ---- Load helpers ----
require_once ROOT . '/functions.php';

// ---- Load site data ----
// NOTE: Data is in content/data.json
$dataPath = ROOT . '/content/data.json';
$site = [];

if (is_readable($dataPath)) {
    $json = file_get_contents($dataPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $site = $decoded;
    }
}

// ---- Normalize defaults ----
$site['meta'] ??= [];
$site['meta']['title_default'] ??= ($site['settings']['site_title'] ?? 'Pure Glow Wellness');
$site['meta']['description_default'] ??= ($site['settings']['meta_description'] ?? '');
$site['meta']['charset'] ??= 'utf-8';
$site['meta']['viewport'] ??= 'width=device-width, initial-scale=1';

$site['social'] ??= [];
// Fallback to old keys if new structure isn't fully adopted, or map them
$site['social']['facebook'] ??= ($site['social']['facebook'] ?? 'https://facebook.com');
$site['social']['instagram'] ??= ($site['social']['instagram'] ?? 'https://instagram.com');
$site['social']['tiktok'] ??= ($site['social']['tiktok'] ?? '');
$site['social']['youtube'] ??= ($site['social']['youtube'] ?? '');
$site['social']['messenger'] ??= ($site['social']['messenger'] ?? 'https://m.me');

$site['nav'] ??= [
    ['label' => 'My Story', 'href' => 'about'],
    ['label' => 'Reviews', 'href' => 'reviews'],
    ['label' => 'Treatments', 'href' => './#treatments'],
    ['label' => 'Contact', 'href' => './#contact'],
];

// ---- Compatibility Alias ----
// Support legacy templates that rely on $data
$data = $site;
