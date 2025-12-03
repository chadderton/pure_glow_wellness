<?php
$preview = isset($_GET['preview']);
$file = $preview ? "content/draft.json" : "content/data.json";
$data = json_decode(file_get_contents($file), true);
?>

<?php include "templates/header.php"; ?>
<?php include "templates/home.php"; ?>
<?php include "templates/footer.php"; ?>
