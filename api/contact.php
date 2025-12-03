<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

// 1. Honeypot Check
if (!empty($_POST['website'])) {
    // Bot detected! Pretend to succeed but do nothing.
    die("Message sent.");
}

// 2. Time Check (Minimum 3 seconds to fill form)
$min_time = 3;
$submitted_time = isset($_POST['form_time']) ? (int)$_POST['form_time'] : 0;
$current_time = time();

if (($current_time - $submitted_time) < $min_time) {
    // Too fast! Likely a bot.
    die("Please wait a moment before sending.");
}

// 3. Sanitize & Validate
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if (!$name || !$email || !$message) {
    die("Please fill in all fields.");
}

// 4. Send Email
$to = "martyn@marpletech.co.uk"; // TODO: Update this to the client's actual email address
$subject = "New Contact from Pure Glow Wellness: $name";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    // Log success for debugging
    file_put_contents("../content/contact_log.txt", "[$current_time] SENT: $name ($email)\n", FILE_APPEND);
} else {
    // Log failure
    file_put_contents("../content/contact_log.txt", "[$current_time] FAILED: $name ($email)\n", FILE_APPEND);
    die("Sorry, there was an error sending your message. Please try again later.");
}

// 5. Redirect with Success
$_SESSION['flash_message'] = "Thank you! Your message has been sent.";
header("Location: ../index.php#contact");
exit;
