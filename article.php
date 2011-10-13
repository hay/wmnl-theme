<div class="article">
    <h2 class="title">
        <a name="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

    <h3 class="meta">Geplaatst <?php the_time('d-m-Y'); ?> door <?php the_author(); ?></h3>

    <?php edit_post_link("[[bewerken]]"); ?>

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

        <?php comments_template(); ?>

        <div id="comments">
            <a id="respond"></a>
            <h3>Reageer</h3>
            <form action="<?php $T->home(); ?>/wp-comments-post.php" method="post" id="commentform">
                    <label for="author">Naam</label>
                    <input type="text" id="author" name="author" value="Anonieme gebruiker" />
                    <br />

                    <label for="email">Email (niet verplicht)</label>
                    <input type="text" id="email" name="email" />
                    <br />

                    <label for="url">Website (niet verplicht)</label>
                    <input type="text" id="url" name="url" />
                    <br />

                    <label for="comment">Reactie</label>
                    <textarea id="comment" name="comment"></textarea>
                    <br />

                    <button name="submit" type="submit" id="submit">Reageer</button>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        </div> <!-- #comments -->
	</div> <!-- .text -->
</div> <!-- .article -->