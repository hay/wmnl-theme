<div class="article">
    <h2 class="title">
        <a name="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

    <h3 class="meta">Geplaatst <?php the_time('d-m-Y'); ?> door <?php the_author(); ?></h3>

    <div class="text">
        <?php
            $WMNL->postthumb();
            if ($excerpt) {
                the_excerpt();
                echo '<p><a href="' . get_permalink() . '">Lees verder &raquo;</a></p>';
            } else {
                the_content("Lees verder &raquo;");
            }
        ?>
        <?php edit_post_link("[[bewerken]]"); ?>
	</div>
</div>