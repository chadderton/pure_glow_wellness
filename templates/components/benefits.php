<section class="benefits" id="benefits">
    <div class="container">
        <h2><?= htmlspecialchars($data['benefits']['title'] ?? '') ?></h2>
        <div class="benefits-grid">
            <?php 
            $list = explode("\n", $data['benefits']['list'] ?? '');
            $icons = [
                'assets/images/icons/icon-relax.svg',
                'assets/images/icons/icon-bespoke.svg',
                'assets/images/icons/icon-studio.svg',
                'assets/images/icons/icon-therapist.svg'
            ];
            
            foreach ($list as $index => $item): 
                if(trim($item)):
                    $icon = $icons[$index] ?? $icons[0]; // Fallback to first icon if list is longer
            ?>
                <div class="benefit-item fade-in-section">
                    <img src="<?= $icon ?>" alt="" class="benefit-icon">
                    <h3><?= htmlspecialchars(trim($item)) ?></h3>
                </div>
            <?php 
                endif;
            endforeach; 
            ?>
        </div>
    </div>
</section>
