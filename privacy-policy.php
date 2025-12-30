<?php
require_once __DIR__ . '/config/bootstrap.php';
$pageTitle = "Privacy Policy | " . ($site['settings']['site_title'] ?? 'Pure Glow Wellness');
$pageDescription = "Privacy Policy for Pure Glow Wellness. Learn how we collect, use, and protect your personal data.";
require PARTIALS . '/layout-top.php';
?>

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <a href="./">Home</a>
        <span class="separator">/</span>
        <span aria-current="page">Privacy Policy</span>
    </div>
</nav>

<div class="container page-container privacy-section max-width-800">
    <h1>Privacy Policy</h1>

    <p><strong>Last Updated: December 2, 2025</strong></p>

    <p>At Pure Glow Wellness, I am committed to protecting your privacy and ensuring that your personal information is
        handled in a safe and responsible manner. This policy outlines how I collect, use, and protect your data in
        compliance with the General Data Protection Regulation (GDPR).</p>

    <h2>1. Who We Are</h2>
    <p>Pure Glow Wellness is a private facial and wellness studio based in Marple, Stockport. The data controller is
        Caroline Hines.</p>
    <p>Contact Email: <a href="mailto:pureglowfacials@gmail.com">pureglowfacials@gmail.com</a></p>

    <h2>2. Information We Collect</h2>
    <p>I may collect the following information when you book an appointment or contact me:</p>
    <ul>
        <li>Name</li>
        <li>Contact information (email address, phone number)</li>
        <li>Medical history and skin concerns (collected via consultation forms for treatment safety)</li>
        <li>Appointment history</li>
    </ul>

    <h2>3. How We Use Your Information</h2>
    <p>Your data is used solely for the following purposes:</p>
    <ul>
        <li>To schedule and manage your appointments.</li>
        <li>To ensure treatments are safe and suitable for your health and skin needs.</li>
        <li>To respond to your enquiries.</li>
        <li>To comply with legal and insurance requirements.</li>
    </ul>

    <h2>4. Data Security</h2>
    <p>I take the security of your data seriously. All digital records are stored securely, and any paper consultation
        forms are kept in a locked, secure location. I do not share your personal data with third parties for marketing
        purposes.</p>

    <h2>5. Your Rights</h2>
    <p>Under GDPR, you have the right to:</p>
    <ul>
        <li>Access the personal data I hold about you.</li>
        <li>Request correction of any incorrect data.</li>
        <li>Request deletion of your data (subject to legal/insurance retention periods).</li>
        <li>Withdraw consent for communication at any time.</li>
    </ul>

    <h2>6. Cookies</h2>
    <p>This website is designed to be privacy-friendly and does not set any cookies for visitors. You can browse the
        site freely without being tracked.</p>

    <h2>7. Changes to This Policy</h2>
    <p>I may update this privacy policy from time to time. Any changes will be posted on this page.</p>

    <h2>8. Contact</h2>
    <p>If you have any questions about this privacy policy or how your data is handled, please contact me at <a
            href="mailto:pureglowfacials@gmail.com">pureglowfacials@gmail.com</a>.</p>
</div>

<?php require PARTIALS . '/layout-bottom.php'; ?>