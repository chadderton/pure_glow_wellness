<section class="benefits" id="benefits">
    <div class="container">
        <h2><?= htmlspecialchars($data['benefits']['title'] ?? '') ?></h2>
        <ul class="benefits-list">
            <?php 
            $list = explode("\n", $data['benefits']['list'] ?? '');
            foreach ($list as $item): 
                if(trim($item)):
            ?>
                <li><?= htmlspecialchars(trim($item)) ?></li>
            <?php 
                endif;
            endforeach; 
            ?>
        </ul>
    </div>
</section>
