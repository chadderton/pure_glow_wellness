<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    http_response_code(403);
    exit("Unauthorized");
}

$contentDir = "../content/";
$zipFile = "../content/backup_" . date('Y-m-d_H-i-s') . ".zip";

$zip = new ZipArchive();
if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    exit("Cannot open <$zipFile>\n");
}

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($contentDir),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    // Skip directories (they would be added automatically)
    if (!$file->isDir()) {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen(realpath($contentDir)) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

$zip->close();

// Serve the file
if (file_exists($zipFile)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.basename($zipFile).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zipFile));
    readfile($zipFile);
    
    // Delete after download to save space
    unlink($zipFile);
    exit;
} else {
    echo "Error creating backup.";
}
