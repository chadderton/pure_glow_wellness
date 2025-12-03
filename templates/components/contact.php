<section class="contact" id="contact">
    <div class="container contact-container">
        <div class="contact-info">
            <h2><?= htmlspecialchars($data['contact']['title'] ?? '') ?></h2>
            <div class="contact-details">
                <p>Email: <a href="mailto:<?= htmlspecialchars($data['contact']['email'] ?? '') ?>"><?= htmlspecialchars($data['contact']['email'] ?? '') ?></a></p>
                <p>Phone: <a href="tel:<?= htmlspecialchars($data['contact']['phone'] ?? '') ?>"><?= htmlspecialchars($data['contact']['phone'] ?? '') ?></a></p>
                <p>Location: Based in central Marple.</p>
            </div>
        </div>

        <div class="contact-form-wrapper">
            <?php if (isset($_SESSION['flash_message'])): ?>
                <div class="alert success" style="background: #d4edda; color: #155724; padding: 1rem; margin-bottom: 1rem; border-radius: 4px;">
                    <?= htmlspecialchars($_SESSION['flash_message']) ?>
                </div>
                <?php unset($_SESSION['flash_message']); ?>
            <?php endif; ?>

            <form action="api/contact.php" method="POST" class="contact-form">
                <!-- Spam Protection: Honeypot & Timestamp -->
                <div class="visually-hidden">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <input type="hidden" name="form_time" value="<?= time() ?>">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>
