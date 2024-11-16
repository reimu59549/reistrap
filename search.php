<?php get_header(); ?>
<div class="contents">
    <div class="wrapper">
        <main class="main">
            <h1 class="archive-title">
                <?php echo get_search_query(); ?>の検索結果
            </h1>
            <div class="entries">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="entry-item">
                            <a href="<?php the_permalink(); ?>" class="entry-item__thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
                                <?php endif; ?>
                            </a>
                            <p class="entry-item__ttl">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </p>
                            <p class="entry-item__date">
                                <date datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                    <?php echo get_the_date(); ?>
                                </date>
                            </p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="pager">
                <?php
                    echo paginate_links(array(
                        'type' => 'list',
                        'prev_text' => '&lt;',
                        'next_text' => '&gt;',
                    ));
                ?>
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>