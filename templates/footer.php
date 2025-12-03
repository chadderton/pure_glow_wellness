    </main>
    <footer class="site-footer">
        <div class="container">
            <?php if (!empty($data['social']['facebook']) || !empty($data['social']['instagram']) || !empty($data['social']['threads'])): ?>
            <div class="social-links">
                <?php if (!empty($data['social']['facebook'])): ?>
                    <a href="<?= htmlspecialchars($data['social']['facebook']) ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
                <?php endif; ?>
                <?php if (!empty($data['social']['instagram'])): ?>
                    <a href="<?= htmlspecialchars($data['social']['instagram']) ?>" target="_blank" rel="noopener noreferrer">Instagram</a>
                <?php endif; ?>
                <?php if (!empty($data['social']['threads'])): ?>
                    <a href="<?= htmlspecialchars($data['social']['threads']) ?>" target="_blank" rel="noopener noreferrer">Threads</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <p>&copy; <?= date('Y') ?> Pure Glow Wellness. All rights reserved.</p>
        </div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>
</html>
