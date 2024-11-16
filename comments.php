<?php if ( comments_open() ) : ?>
    <div id="comments" class="comments">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments__ttl">
                コメント<span class="comments__num">（<?php comments_number( '0', '1', '%' ); ?>件）</span>
            </h2>
            <ul class="comments__list">
                <?php wp_list_comments( 'avatar_size=80' ); ?>
            </ul>
        <?php endif; ?>
        <?php if ( get_comment_pages_count() > 1 ) : ?>
            <div class="pager pager--comments">
                <?php
                    paginate_comments_links( array(
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                        'mid_size'  => 0,
                    ) );
                ?>
            </div>
        <?php endif; ?>
        <?php
            $args = array(
                'title_reply' => 'コメントする',
                'label_submit' => 'コメントを送信',
                'title_reply_before' => '<h2 class="comment-ttl">',
                'title_reply_after' => '</h2>',
            );
            comment_form( $args );
        ?>
    </div><!-- #comments -->
<?php endif; ?>