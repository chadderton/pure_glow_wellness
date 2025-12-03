<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    http_response_code(403);
    exit("Unauthorized");
}

$targetDir = "../content/uploads/images/";
if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit("Upload failed");
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($_FILES['image']['tmp_name']);
$allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

if (!in_array($mime, $allowed)) {
    http_response_code(400);
    exit("Invalid file type");
}

$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$filename = time() . "_" . uniqid() . "." . $ext;
$targetPath = $targetDir . $filename;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    http_response_code(500);
    exit("Failed to move uploaded file");
}

// Resize to max 1920px (Full HD)
list($w, $h) = getimagesize($targetPath);
$max = 1920;

// Load the source image
switch ($mime) {
    case 'image/jpeg': $src = imagecreatefromjpeg($targetPath); break;
    case 'image/png': $src = imagecreatefrompng($targetPath); break;
    case 'image/gif': $src = imagecreatefromgif($targetPath); break;
    case 'image/webp': $src = imagecreatefromwebp($targetPath); break;
    default: $src = null;
}

if ($src) {
    // 1. Resize Original if too big
    if ($w > $max) {
        $ratio = $max / $w;
        $newW = $max;
        $newH = intval($h * $ratio);
        
        $dst = imagecreatetruecolor($newW, $newH);
        if ($mime == 'image/png' || $mime == 'image/webp' || $mime == 'image/gif') {
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
        
        // Save back to target
        switch ($mime) {
            case 'image/jpeg': imagejpeg($dst, $targetPath, 85); break;
            case 'image/png': imagepng($dst, $targetPath); break;
            case 'image/gif': imagegif($dst, $targetPath); break;
            case 'image/webp': imagewebp($dst, $targetPath); break;
        }
        imagedestroy($dst);
        
        // Update $w and $h for subsequent resizes
        $w = $newW;
        $h = $newH;
        // Reload src from resized image to avoid quality loss? 
        // Actually, better to keep original $src if memory allows, but we just destroyed it? 
        // No, we destroyed $dst. $src is still the original full size. 
        // Wait, if we overwrite $targetPath, we should probably reload $src or just use the original $src but scale down more.
        // Using original $src is better for quality.
    }

    // 2. Generate Variants
    require_once '../functions.php';
    $info = pathinfo($targetPath);
    $dir = $info['dirname'];
    $name = $info['filename'];
    $ext = $info['extension'];

    $sizes = [1600, 1200, 800, 480];
    foreach ($sizes as $size) {
        $variantPath = "{$dir}/{$name}-{$size}w.{$ext}";
        resize_image_file($targetPath, $variantPath, $size);
    }

    imagedestroy($src);
}

echo "content/uploads/images/" . $filename;
