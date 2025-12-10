<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Load password hash from .env
    $envPath = __DIR__ . '/../.env';
    $password_hash = '';
    
    if (file_exists($envPath)) {
        $env = parse_ini_file($envPath);
        $password_hash = $env['EDITOR_PASS_HASH'] ?? '';
    }
    
    if ($password_hash && password_verify($_POST['password'], $password_hash)) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid password";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Editor Login</title>
<link rel="stylesheet" href="editor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="login-page">

<div class="login-box">
    <h2>Editor Login</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
