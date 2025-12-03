<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Default password is: PureGlow2025!
    // Generated with: password_hash('PureGlow2025!', PASSWORD_DEFAULT)
    $password_hash = '$2y$10$1eJR0heVs1fo9NpJvIAqXOXptUfw67zYdmG0z/LEBz8ZypufRIgX6'; 
    
    if (password_verify($_POST['password'], $password_hash)) {
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
