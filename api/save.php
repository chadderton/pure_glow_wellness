<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    http_response_code(403);
    exit("Unauthorized");
}

$mode = $_GET['mode'] ?? 'draft';

$draftPath = "../content/draft.json";
$livePath = "../content/data.json";

$incoming = json_decode(file_get_contents("php://input"), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    exit("Invalid JSON");
}

if (file_put_contents($draftPath, json_encode($incoming, JSON_PRETTY_PRINT)) === false) {
    http_response_code(500);
    exit("Failed to save draft");
}

if ($mode === 'publish') {
    if (!copy($draftPath, $livePath)) {
        http_response_code(500);
        exit("Failed to publish");
    }
}

echo "ok";
