<?php bloginfo('name'); ?>
<?php bloginfo('description'); ?>
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo("name"); ?> Theme by <?php $theme_data = wp_get_theme();
$author = $theme_data->get( 'Author' );
echo $author; ?>.</p>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/nav.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/highlight/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
</body>
</html>