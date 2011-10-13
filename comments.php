<?php if (have_comments()) : ?>
    <div id="commentlist">
        <h3>Reacties</h3>
        <ul>
            <?php wp_list_comments(); ?>
        </ul>
    </div>
<?php endif; ?>