<?php
// テーマの読み込み、対応させる機能の追加、メニューの追加などを担うファイルを読み込み wp-content/themes/reistrap/includesフォルダ内のfunctions-theme-setup.php
require 'includes/functions-theme-setup.php';
// 「カスタマイズ」にある「スタイル」、「その他」の項目の追加を担うファイルを読み込み
require 'includes/functions-customize-panel.php';
// OGPタグ読み込み
function my_custom_ogp() {
    // 基本的なOGPタグ
    echo '<meta property="og:title" content="' . get_the_title() . '">';
    echo '<meta property="og:type" content="article">';
    echo '<meta property="og:url" content="' . get_permalink() . '">';
    echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '">';
    echo '<meta property="og:description" content="' . get_the_excerpt() . '">';

    // アイキャッチ画像がある場合
    if ( has_post_thumbnail() ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
        echo '<meta property="og:image" content="' . esc_url( $image[0] ) . '">';
    }
}
add_action( 'wp_head', 'my_custom_ogp' );

function my_theme_widget_settings() {
    register_sidebar( array(
        'name' => 'サイドバー',
        'id' => 'sidebar',
        'description' => 'メインのウィジェットです。',
        'before_widget' => '<div id="%1$s" class="widget widget--sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget__ttl">',
        'after_title'   => '</h2>',
    ) );
}
add_action('widgets_init', 'my_theme_widget_settings');
?>