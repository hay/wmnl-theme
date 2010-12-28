<div id="aside" role="complementary">
    <div class="top"></div>
    <div class="content">
        <?php
            if (is_front_page()) {
                dynamic_sidebar('home-sidebar');
            } else {
                dynamic_sidebar('sidebar');
            }
        ?>
    </div>
</div> <!-- #aside -->