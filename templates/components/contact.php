<section class="contact" id="contact">
    <div class="container contact-container">
        <div class="contact-info">
            <h2><?= htmlspecialchars($data['contact']['title'] ?? '') ?></h2>
            <div class="contact-body">
                <?php if (!empty($data['contact']['intro'])): ?>
                    <p><?= nl2br(htmlspecialchars($data['contact']['intro'])) ?></p>
                <?php endif; ?>

                <?php if (!empty($data['contact']['instructions'])): ?>
                    <ul>
                        <?php foreach ($data['contact']['instructions'] as $instruction): ?>
                            <li><?= htmlspecialchars($instruction) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($data['contact']['outro'])): ?>
                    <p><?= nl2br(htmlspecialchars($data['contact']['outro'])) ?></p>
                <?php endif; ?>

                <?php if (!empty($data['contact']['reassurance'])): ?>
                    <p class="reassurance-text">
                        <?= htmlspecialchars($data['contact']['reassurance']) ?>
                    </p>
                <?php endif; ?>

                <?php if (empty($data['contact']['intro']) && !empty($data['contact']['body'])): ?>
                    <?= nl2br(htmlspecialchars($data['contact']['body'])) ?>
                <?php endif; ?>
            </div>
            <div class="contact-details">
                <p>Phone / WhatsApp: <a
                        href="tel:<?= htmlspecialchars(str_replace(' ', '', $data['contact']['phone'] ?? '')) ?>"><?= htmlspecialchars($data['contact']['phone'] ?? '') ?></a>
                </p>
                <p>Email: <a
                        href="mailto:<?= htmlspecialchars($data['contact']['email'] ?? '') ?>"><?= htmlspecialchars($data['contact']['email'] ?? '') ?></a>
                </p>
                <p class="contact-prefer">
                    Prefer messaging? <a href="<?= htmlspecialchars($PGW_MESSENGER_URL) ?>" target="_blank"
                        rel="noopener noreferrer">Message me on Facebook</a>.
                </p>
            </div>
        </div>

        <div class="contact-form-wrapper">
            <?php if (!empty($data['quotes']['contact'])): ?>
                <p class="section-quote text-center">
                    <?= htmlspecialchars($data['quotes']['contact']) ?>
                </p>
            <?php endif; ?>

            <div id="form-message" class="form-message"></div>

            <form id="contactForm" action="api/contact.php" method="POST" class="contact-form">
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
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit"
                    class="btn btn-primary"><?= htmlspecialchars($data['contact']['button_text'] ?? 'Send Message') ?></button>
            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById('contactForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = this;
        const btn = form.querySelector('button[type="submit"]');
        const msgDiv = document.getElementById('form-message');
        const originalBtnText = btn.innerText;

        // Reset message
        msgDiv.style.display = 'none';
        msgDiv.classList.remove('form-message-success', 'form-message-error');

        // Disable button
        btn.disabled = true;
        btn.innerText = 'Sending...';

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (response.ok && result.ok) {
                // Success
                msgDiv.innerText = "Thank you! Your message has been sent.";
                msgDiv.classList.add('form-message-success');
                msgDiv.style.display = "block";
                form.reset();
            } else {
                // Error from server
                throw new Error(result.error || 'Something went wrong.');
            }
        } catch (error) {
            // Network or other error
            msgDiv.innerText = error.message;
            msgDiv.classList.add('form-message-error');
            msgDiv.style.display = "block";
        } finally {
            btn.disabled = false;
            btn.innerText = originalBtnText;
        }
    });
</script>