<?php
// router.php for local testing of clean URLs

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files directly if they exist
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Check if it's a known page without .php (e.g., /about -> /about.php)
$requestedFile = __DIR__ . $uri . '.php';
if (file_exists($requestedFile)) {
    include $requestedFile;
    return;
}

// Check for directory index (e.g. / -> /index.php)
if ($uri === '/' || is_dir(__DIR__ . $uri)) {
    include __DIR__ . '/index.php';
    return;
}

// 404
http_response_code(404);
include __DIR__ . '/404.php';
