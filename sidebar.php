<aside class="sidebar">
    <div class="sidebar__inner">
        <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar' ); ?>
        <?php endif; ?>
    </div>
</aside>