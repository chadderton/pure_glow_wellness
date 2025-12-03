<?php
session_start();

function require_login() {
    if (!isset($_SESSION['loggedin'])) {
        header("Location: login.php");
        exit;
    }
}
