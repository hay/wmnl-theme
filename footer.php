<?php global $T; ?>
    <div id="footer">
        <div class="nav-search">
            <div class="nav"><?php $T->menu(); ?></div>
            <form class="searchform" name="searchform" method="get" action="<?php echo home_url(); ?>">
                <div>
        			<input type="text" id="s" name="s" />
        			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyten' ); ?>" />
    			</div>
            </form>
        </div>

        <img class="logo" src="<?php $T->theme(); ?>/img/logotrans.png" alt="Wikimedia Nederland" />
    </div> <!-- #footer -->
</div> <!-- #wrapper -->
<?php wp_footer(); ?>

<!-- Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
    var pageTracker = _gat._getTracker("UA-8052007-2");
    pageTracker._initData();
    pageTracker._trackPageview();
} catch(err) {}
</script>
<!-- /Google Analytics -->

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<?php /* "Just what do you think you're doing Dave?" */ ?>
</body>
</html>