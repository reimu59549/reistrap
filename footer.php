<button class="js-backToTop pagetop"><i class="bi bi-arrow-up"></i></button>
<?php echo bloginfo('name'); ?>
<?php echo bloginfo('description'); ?>
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo("name"); ?> Theme by <?php $theme_data = wp_get_theme();
$author = $theme_data->get( 'Author' );
echo $author; ?>.</p>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/back-to-top.js?ver=1.0.2" type="text/javascript"></script>
<script>hljs.highlightAll();</script>
</body>
</html>
