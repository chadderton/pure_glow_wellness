<?php
// Generate missing favicons from the high-res source
$source = '../favicon/web-app-manifest-512x512.png';
$destDir = '../favicon/';

if (!file_exists($source)) {
    die("Source file not found: $source\n");
}

$sizes = [16, 32];

foreach ($sizes as $size) {
    $dest = $destDir . "favicon-{$size}x{$size}.png";
    if (file_exists($dest)) {
        echo "Skipping $dest (already exists)\n";
        continue;
    }

    echo "Generating $dest...\n";
    
    $srcImg = imagecreatefrompng($source);
    $dstImg = imagecreatetruecolor($size, $size);
    
    // Preserve transparency
    imagecolortransparent($dstImg, imagecolorallocatealpha($dstImg, 0, 0, 0, 127));
    imagealphablending($dstImg, false);
    imagesavealpha($dstImg, true);
    
    imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $size, $size, 512, 512);
    
    imagepng($dstImg, $dest);
    
    imagedestroy($srcImg);
    imagedestroy($dstImg);
}

echo "Favicon generation complete.\n";
