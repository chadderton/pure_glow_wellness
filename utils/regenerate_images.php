<?php
session_start();
// Allow if logged in OR if running from command line
if (!isset($_SESSION['loggedin']) && php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit("Unauthorized");
}

// Run this script to regenerate all image sizes
require_once '../functions.php';

$directories = [
    '../assets/images/hero',
    '../assets/images/about',
    '../assets/images/services',
    '../content/uploads/images'
];

echo "Starting image regeneration...\n";

foreach ($directories as $dir) {
    if (!is_dir($dir)) continue;
    
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        // Skip existing variants
        if (strpos($file, '-480w') !== false || strpos($file, '-800w') !== false || strpos($file, '-1200w') !== false || strpos($file, '-1600w') !== false) {
            continue;
        }

        $path = $dir . '/' . $file;
        
        $imgInfo = @getimagesize($path);
        if (!$imgInfo) continue;
        $mime = $imgInfo['mime'];
        
        if (strpos($mime, 'image/') === 0 && strpos($mime, 'svg') === false) {
            echo "Processing: $file\n";
            
            $info = pathinfo($path);
            $base = $dir . '/' . $info['filename'];
            $ext = $info['extension'];

            // Generate sizes
            resize_image_file($path, "{$base}-1600w.{$ext}", 1600);
            resize_image_file($path, "{$base}-1200w.{$ext}", 1200);
            resize_image_file($path, "{$base}-800w.{$ext}", 800);
            resize_image_file($path, "{$base}-480w.{$ext}", 480);
        }
    }
}

echo "Done!\n";
