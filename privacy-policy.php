<?php
session_start();
require_once 'functions.php';

$preview = isset($_GET['preview']);
$file = $preview ? "content/draft.json" : "content/data.json";
$data = json_decode(file_get_contents($file), true);

// Social Media Configuration (pulled from CMS data)
$PGW_INSTAGRAM_URL = $data['social']['instagram'] ?? "https://instagram.com";
$PGW_FACEBOOK_PAGE_URL = $data['social']['facebook'] ?? "https://facebook.com";
$PGW_MESSENGER_URL = $data['social']['messenger'] ?? "https://m.me";

// Page-specific SEO
$pageTitle = "Privacy Policy | " . ($data['settings']['site_title'] ?? 'Pure Glow Wellness');
$pageDescription = "Privacy Policy for Pure Glow Wellness. Learn how we collect, use, and protect your personal data.";
?>

<?php include "templates/header.php"; ?>

<div class="container" style="padding: 4rem 1rem; max-width: 800px;">
    <h1 style="text-align: center; margin-bottom: 3rem;">Privacy Policy</h1>
    
    <p><strong>Last Updated: December 2, 2025</strong></p>
    
    <p>At Pure Glow Wellness, I am committed to protecting your privacy and ensuring that your personal information is handled in a safe and responsible manner. This policy outlines how I collect, use, and protect your data in compliance with the General Data Protection Regulation (GDPR).</p>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Who We Are</h2>
    <p>Pure Glow Wellness is a private facial and wellness studio based in Marple, Stockport. The data controller is Caroline Hines.</p>
    <p>Contact Email: <a href="mailto:pureglowfacials@gmail.com" style="color: var(--pgw-primary); font-weight: 600;">pureglowfacials@gmail.com</a></p>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Information We Collect</h2>
    <p>I may collect the following information when you book an appointment or contact me:</p>
    <ul style="list-style: disc; padding-left: 1.5rem; margin-bottom: 1rem;">
        <li>Name</li>
        <li>Contact information (email address, phone number)</li>
        <li>Medical history and skin concerns (collected via consultation forms for treatment safety)</li>
        <li>Appointment history</li>
    </ul>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. How We Use Your Information</h2>
    <p>Your data is used solely for the following purposes:</p>
    <ul style="list-style: disc; padding-left: 1.5rem; margin-bottom: 1rem;">
        <li>To schedule and manage your appointments.</li>
        <li>To ensure treatments are safe and suitable for your health and skin needs.</li>
        <li>To respond to your enquiries.</li>
        <li>To comply with legal and insurance requirements.</li>
    </ul>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">4. Data Security</h2>
    <p>I take the security of your data seriously. All digital records are stored securely, and any paper consultation forms are kept in a locked, secure location. I do not share your personal data with third parties for marketing purposes.</p>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">5. Your Rights</h2>
    <p>Under GDPR, you have the right to:</p>
    <ul style="list-style: disc; padding-left: 1.5rem; margin-bottom: 1rem;">
        <li>Access the personal data I hold about you.</li>
        <li>Request correction of any incorrect data.</li>
        <li>Request deletion of your data (subject to legal/insurance retention periods).</li>
        <li>Withdraw consent for communication at any time.</li>
    </ul>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">6. Cookies</h2>
    <p>This website may use simple cookies to ensure the site functions correctly. We do not use invasive tracking cookies.</p>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">7. Changes to This Policy</h2>
    <p>I may update this privacy policy from time to time. Any changes will be posted on this page.</p>

    <h2 style="text-align: left; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">8. Contact</h2>
    <p>If you have any questions about this privacy policy or how your data is handled, please contact me at <a href="mailto:pureglowfacials@gmail.com" style="color: var(--pgw-primary); font-weight: 600;">pureglowfacials@gmail.com</a>.</p>
</div>

<?php include "templates/footer.php"; ?>
