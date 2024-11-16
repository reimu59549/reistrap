<?php get_header(); ?>
<div class="contents">
    <div class="wrapper">
        <main class="main">
        <?php output_breadcrumb(); ?>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="article">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            <p class="entry-date">
                                <date datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                    <?php echo get_the_date(); ?>
                                </date>
                            </p>
                            <div class="entry-category">
                                <?php the_category(); ?>
                            </div>
                            <div class="entry-tag">
                                <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                            </div>
                            <div class="entry-thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
                                <?php endif; ?>
                            </div>
                        </header>
                        <div <?php post_class( 'entry-content' ); ?>>
                            <?php the_content(); ?>
                        </div>
                    <?php comments_template(); ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>