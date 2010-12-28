<?php global $T; ?>
<?php get_header(); ?>
<div id="content">
    <div id="main">
    <?php
        if (is_front_page()) {
            dynamic_sidebar('home');
        } else if ($post->post_name == "nieuws") {
            require 'blog.php';
        } else {
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    require 'article.php';
                }
            } else {
                require '404_msg.php';
            }
        }
    ?>
   </div> <!--#main -->
    <?php get_sidebar(); ?>
</div> <!-- #content -->
<?php get_footer(); ?>