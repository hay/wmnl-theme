<?php global $T, $WMNL; ?>
    <div id="footer">
        <div class="nav-search">
            <div class="nav"><?php $WMNL->menu(); ?></div>
            <form class="searchform" name="searchform" method="get" action="<?php echo home_url(); ?>">
                <div>
        			<input type="text" id="s" name="s" />
        			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyten' ); ?>" />
    			</div>
            </form>
        </div>
    </div> <!-- #footer -->
</div> <!-- #wrapper -->

<?php if ($T->getThemeOption("custom-js")) : ?>
    <script>
        <?php $T->themeOption("custom-js"); ?>
    </script>
<?php endif; ?>

<?php wp_footer(); ?>

<?php if ($T->getThemeOption('google-analytics-id')): ?>
  <!-- Google Analytics -->
  <script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php $T->themeOption('google-analytics-id'); ?>']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <!-- /Google Analytics -->
<?php endif; ?>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<?php /* "Just what do you think you're doing Dave?" */ ?>
</body>
</html>