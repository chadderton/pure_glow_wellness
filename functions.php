<?php

function get_image_variants($filePath)
{
    // $filePath is like "assets/images/hero/hero.jpg" OR "assets/images/retreat/retreatimage-1024w.webp"
    $info = pathinfo($filePath);
    $dir = $info['dirname'];

    // Strip existing width suffix if present (e.g. name-1024w -> name)
    $name = preg_replace('/-\d+w$/', '', $info['filename']);
    $ext = $info['extension'];

    // Define all potential sizes
    $sizes = ['480', '512', '640', '768', '800', '960', '1024', '1080', '1200', '1280', '1600'];

    $variants = [];
    foreach ($sizes as $size) {
        $variants[$size] = "{$dir}/{$name}-{$size}w.{$ext}";
    }

    return $variants;
}

function get_srcset($filePath)
{
    $variants = get_image_variants($filePath);
    $srcset = [];

    // Check if original file exists relative to document root
    if (file_exists($filePath)) {
        // We assume the original is the largest available quality (e.g. 1920w or original upload)
        // We won't assign a specific 'w' to the original in srcset to avoid lying, 
        // unless we measure it. But for simplicity, we'll rely on the variants.
        // Actually, standard practice is to include original if it's larger than the largest variant.
        // For now, let's just include the generated variants which are guaranteed to exist and have known widths.
    }

    // Sort variants by size descending for check, but srcset usually prefers ascending (unimportant for functional srcset string)
    krsort($variants);

    foreach ($variants as $width => $path) {
        if (file_exists($path)) {
            $srcset[] = "{$path} {$width}w";
        }
    }

    // If no variants exist, return empty string (browser uses src)
    if (empty($srcset))
        return '';

    return implode(", ", $srcset);
}

function resize_image_file($sourcePath, $targetPath, $maxWidth)
{
    if (!file_exists($sourcePath))
        return false;

    list($w, $h, $type) = getimagesize($sourcePath);

    // If original is smaller than target, just copy it (or skip)
    if ($w <= $maxWidth) {
        // Optional: copy($sourcePath, $targetPath);
        return true;
    }

    $ratio = $maxWidth / $w;
    $newW = $maxWidth;
    $newH = intval($h * $ratio);

    $src = null;
    switch ($type) {
        case IMAGETYPE_JPEG:
            if (function_exists('imagecreatefromjpeg'))
                $src = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            if (function_exists('imagecreatefrompng'))
                $src = imagecreatefrompng($sourcePath);
            break;
        case IMAGETYPE_GIF:
            if (function_exists('imagecreatefromgif'))
                $src = imagecreatefromgif($sourcePath);
            break;
        case IMAGETYPE_WEBP:
            if (function_exists('imagecreatefromwebp'))
                $src = imagecreatefromwebp($sourcePath);
            break;
        default:
            return false;
    }

    if (!$src)
        return false;

    $dst = imagecreatetruecolor($newW, $newH);

    // Preserve transparency
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_WEBP || $type == IMAGETYPE_GIF) {
        imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
    }

    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($dst, $targetPath, 80);
            break;
        case IMAGETYPE_PNG:
            imagepng($dst, $targetPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($dst, $targetPath);
            break;
        case IMAGETYPE_WEBP:
            imagewebp($dst, $targetPath, 80);
            break;
    }

    imagedestroy($src);
    imagedestroy($dst);
    return true;
}
