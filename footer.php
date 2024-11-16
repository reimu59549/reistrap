<?php echo bloginfo('name'); ?>
<?php echo bloginfo('description'); ?>
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo("name"); ?> Theme by <?php $theme_data = wp_get_theme();
$author = $theme_data->get( 'Author' );
echo $author; ?>.</p>
</div>
<script>hljs.highlightAll();</script>
</body>
</html>
