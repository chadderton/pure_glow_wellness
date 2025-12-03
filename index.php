<?php
session_start();
require_once 'functions.php';

$preview = isset($_GET['preview']);
$file = $preview ? "content/draft.json" : "content/data.json";
$data = json_decode(file_get_contents($file), true);

// Social Media Configuration (pulled from CMS data)
$PGW_INSTAGRAM_URL = $data['social']['instagram'] ?? "https://instagram.com";
$PGW_FACEBOOK_PAGE_URL = $data['social']['facebook'] ?? "https://facebook.com";
$PGW_MESSENGER_URL = $data['social']['messenger'] ?? "https://m.me"; // Note: Added messenger to data
?>

<?php include "templates/header.php"; ?>
<?php include "templates/home.php"; ?>
<?php include "templates/footer.php"; ?>
