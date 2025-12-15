<?php
$files = [
    'assets/images/hero/hero_image.webp',
    'assets/images/about/about_caroline.webp'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $info = getimagesize($file);
        echo "File: $file - Width: " . $info[0] . "px\n";
    } else {
        echo "File: $file - Not found\n";
    }
}
