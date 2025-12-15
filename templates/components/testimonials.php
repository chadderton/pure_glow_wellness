<section class="testimonials" id="testimonials">
    <div class="container">
        <h2><?= htmlspecialchars($data['testimonials']['title'] ?? '') ?></h2>

        <div class="testimonials-grid">
            <?php for ($i = 1; $i <= 3; $i++):
                $text = $data['testimonials']["review_{$i}_text"] ?? '';
                $author = $data['testimonials']["review_{$i}_author"] ?? '';
                if ($text):
                    ?>
                    <div class="testimonial-card fade-in-section">
                        <blockquote>“<?= nl2br(htmlspecialchars($text)) ?>”</blockquote>
                        <cite>— <?= htmlspecialchars($author) ?></cite>
                    </div>
                <?php endif; endfor; ?>
        </div>

        <?php if (!empty($data['testimonials']['read_more_text'])): ?>
            <div class="testimonials-footer" style="text-align: center; margin-top: 2rem;">
                <a href="<?= htmlspecialchars($data['testimonials']['read_more_url'] ?? 'reviews.php') ?>" class="text-link"
                    style="color: var(--pgw-primary); text-decoration: none; font-weight: 600; border-bottom: 1px solid currentColor;">
                    <?= htmlspecialchars($data['testimonials']['read_more_text']) ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>