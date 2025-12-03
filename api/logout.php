<?php
session_start();
session_destroy();
header("Location: ../editor/login.php");
exit;
