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

// Resize to max 1600px
list($w, $h) = getimagesize($targetPath);
$max = 1600;
if ($w > $max) {
    $ratio = $max / $w;
    $newW = $max;
    $newH = intval($h * $ratio);

    switch ($mime) {
        case 'image/jpeg': $src = imagecreatefromjpeg($targetPath); break;
        case 'image/png': $src = imagecreatefrompng($targetPath); break;
        case 'image/gif': $src = imagecreatefromgif($targetPath); break;
        case 'image/webp': $src = imagecreatefromwebp($targetPath); break;
        default: $src = null;
    }

    if ($src) {
        $dst = imagecreatetruecolor($newW, $newH);
        
        // Preserve transparency for PNG/WEBP/GIF
        if ($mime == 'image/png' || $mime == 'image/webp' || $mime == 'image/gif') {
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
        
        switch ($mime) {
            case 'image/jpeg': imagejpeg($dst, $targetPath, 85); break;
            case 'image/png': imagepng($dst, $targetPath); break;
            case 'image/gif': imagegif($dst, $targetPath); break;
            case 'image/webp': imagewebp($dst, $targetPath); break;
        }
        
        imagedestroy($src);
        imagedestroy($dst);
    }
}

echo "uploads/images/" . $filename;
