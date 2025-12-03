<section class="contact" id="contact">
    <div class="container">
        <h2><?= htmlspecialchars($data['contact']['title'] ?? '') ?></h2>
        <div class="contact-details">
            <p>Email: <a href="mailto:<?= htmlspecialchars($data['contact']['email'] ?? '') ?>"><?= htmlspecialchars($data['contact']['email'] ?? '') ?></a></p>
            <p>Phone: <a href="tel:<?= htmlspecialchars($data['contact']['phone'] ?? '') ?>"><?= htmlspecialchars($data['contact']['phone'] ?? '') ?></a></p>
        </div>
    </div>
</section>
