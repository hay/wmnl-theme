<?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
        'posts_per_page' => get_option( 'posts_per_page' ),
        'paged' => $paged
    ));
    
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $excerpt = true;
            $wp_query->the_post();
            require 'article.php';
        }
    }
?>