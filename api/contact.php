<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json; charset=utf-8');

function respond(int $code, array $payload): void
{
  http_response_code($code);
  echo json_encode($payload);
  exit;
}

require __DIR__ . '/../vendor/autoload.php';

// Honeypot
if (!empty($_POST['website'] ?? '')) {
  respond(200, ['ok' => true]);
}

// Basic rate limit (per IP, 1 request per 20 seconds)
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateFile = sys_get_temp_dir() . '/pgw_rate_' . preg_replace('/[^a-zA-Z0-9_\-]/', '_', $ip);
$now = time();
if (is_file($rateFile)) {
  $last = (int) @file_get_contents($rateFile);
  if ($last > 0 && ($now - $last) < 20) {
    respond(429, ['ok' => false, 'error' => 'Please wait a moment and try again.']);
  }
}
@file_put_contents($rateFile, (string) $now);

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
  respond(400, ['ok' => false, 'error' => 'Please fill in all fields.']);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  respond(400, ['ok' => false, 'error' => 'Please enter a valid email address.']);
}

// CONFIG
$SMTP_HOST = 'mail.mthstaging.co.uk';
$SMTP_PORT = 465;
$SMTP_USER = 'mailer@mthstaging.co.uk';
$FROM_EMAIL = 'mailer@mthstaging.co.uk';
$FROM_NAME = 'Pure Glow Wellness';
$TO_EMAIL = 'pureglowfacials@gmail.com';
$TO_NAME = 'Pure Glow Wellness';

// Load SMTP_PASS from .env
$envPath = __DIR__ . '/../.env';
$SMTP_PASS = '';

if (file_exists($envPath)) {
  $env = parse_ini_file($envPath, false, INI_SCANNER_RAW);
  $SMTP_PASS = (string) ($env['SMTP_PASS'] ?? '');
  $SMTP_PASS = trim($SMTP_PASS);
  // Strip surrounding quotes if present
  if (
    (str_starts_with($SMTP_PASS, '"') && str_ends_with($SMTP_PASS, '"')) ||
    (str_starts_with($SMTP_PASS, "'") && str_ends_with($SMTP_PASS, "'"))
  ) {
    $SMTP_PASS = substr($SMTP_PASS, 1, -1);
  }
}

if ($SMTP_PASS === '') {
  error_log('[PGW contact] SMTP_PASS not found in .env');
  respond(500, ['ok' => false, 'error' => 'Server configuration error.']);
}

try {
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = $SMTP_HOST;
  $mail->SMTPAuth = true;
  $mail->Username = $SMTP_USER;
  $mail->Password = $SMTP_PASS;
  $mail->Port = $SMTP_PORT;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

  // Identity / headers
  $mail->CharSet = 'UTF-8';
  $mail->setFrom($FROM_EMAIL, $FROM_NAME);
  $mail->addAddress($TO_EMAIL, $TO_NAME);
  $mail->addReplyTo($email, $name);
  $mail->MessageID = sprintf('<%s.%s@%s>', bin2hex(random_bytes(6)), (string) $now, 'mthstaging.co.uk');
  $mail->addCustomHeader('X-Mailer', 'PureGlowContact/1.0');

  // Content
  $safeName = preg_replace("/[\r\n]+/", ' ', $name);
  $safeEmail = preg_replace("/[\r\n]+/", ' ', $email);

  $mail->Subject = "Pure Glow website enquiry: {$safeName}";
  $mail->isHTML(false);

  $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
  $ref = $_SERVER['HTTP_REFERER'] ?? 'unknown';

  // Content
  $safeName = preg_replace("/[\r\n]+/", ' ', $name);
  $safeEmail = preg_replace("/[\r\n]+/", ' ', $email);

  $mail->Subject = "Pure Glow website enquiry: {$safeName}";
  $mail->isHTML(true);

  $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
  $ref = $_SERVER['HTTP_REFERER'] ?? 'unknown';

  // Branding Colors
  $primaryColor = '#9A5B48';
  $bgColor = '#FFF9F5';
  $textColor = '#4A3C36';
  $accentColor = '#C1A59B';

  // Base URL for assets
  $prodBase = "https://www.pureglowvibes.co.uk";
  $logoUrl = $prodBase . "/assets/images/brand/text_logo.png"; // Using PNG as SVG support in email is spotty

  $bodyHtml = <<<HTML
<!DOCTYPE html>
<html>
<head>
  <style>
    body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: {$textColor}; background-color: {$bgColor}; margin: 0; padding: 0; }
    .wrapper { width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #eee; }
    .header { background-color: {$bgColor}; padding: 40px 20px; text-align: center; }
    .header .logo-text { font-family: 'Playfair Display', Georgia, 'Times New Roman', serif; font-size: 32px; color: {$primaryColor}; font-weight: bold; letter-spacing: 0.05em; }
    .content { padding: 40px 30px; line-height: 1.6; }
    .field { margin-bottom: 25px; }
    .field-label { font-weight: bold; color: {$primaryColor}; text-transform: uppercase; font-size: 12px; letter-spacing: 0.1em; margin-bottom: 5px; display: block; }
    .field-value { font-size: 16px; margin: 0; }
    .message-box { background-color: #fcfcfc; border-left: 4px solid {$accentColor}; padding: 15px 20px; font-style: italic; }
    .footer { background-color: #f8f8f8; padding: 30px; text-align: center; font-size: 14px; border-top: 1px solid #eee; }
    .footer a { color: {$primaryColor}; text-decoration: none; font-weight: bold; }
    .meta { margin-top: 30px; padding-top: 15px; border-top: 1px dashed #ddd; font-size: 11px; color: #999; text-align: left; line-height: 1.4; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <span class="logo-text">Pure Glow Wellness</span>
    </div>
    <div class="content">
      <div class="field">
        <span class="field-label">From</span>
        <p class="field-value"><strong>{$safeName}</strong> &lt;{$safeEmail}&gt;</p>
      </div>
      
      <div class="field">
        <span class="field-label">Message</span>
        <div class="message-box">
          {$message}
        </div>
      </div>

      <div class="meta">
        <strong>Technical Details:</strong><br>
        IP: {$ip}<br>
        Referrer: {$ref}<br>
        User-Agent: {$ua}
      </div>
    </div>
    <div class="footer">
      <p>Sent from your website &bull; <a href="https://www.pureglowvibes.co.uk/">pureglowvibes.co.uk</a></p>
    </div>
  </div>
</body>
</html>
HTML;

  $bodyPlain =
    "Website enquiry\n\n" .
    "Name: {$safeName}\n" .
    "Email: {$safeEmail}\n\n" .
    "Message:\n{$message}\n\n" .
    "----\n" .
    "IP: {$ip}\n" .
    "Referrer: {$ref}\n" .
    "User-Agent: {$ua}\n";

  $mail->Body = $bodyHtml;
  $mail->AltBody = $bodyPlain;

  $mail->send();
  respond(200, ['ok' => true]);

} catch (Exception $e) {
  error_log('[PGW contact] PHPMailer error: ' . ($mail->ErrorInfo ?: $e->getMessage()));
  respond(500, ['ok' => false, 'error' => 'Message could not be sent. Please email directly.']);
}
