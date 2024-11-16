<?php echo bloginfo('name'); ?>
<?php echo bloginfo('description'); ?>
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo("name"); ?> Theme by <?php $theme_data = wp_get_theme();
$author = $theme_data->get( 'Author' );
echo $author; ?>.</p>
</div>
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.9.0/build/highlight.min.js"></script>
<!-- and it's easy to individually load additional languages -->
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.9.0/build/languages/go.min.js"></script>
<script>hljs.highlightAll();</script>
</body>
</html>
