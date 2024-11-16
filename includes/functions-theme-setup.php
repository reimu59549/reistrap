<?php
function my_theme_setup() {
	// タイトルを自動出力
	add_theme_support( 'title-tag' );

	// アイキャッチ機能を使用
	add_theme_support( 'post-thumbnails' );

	// 埋め込みのレスポンシブ自動対応
	add_theme_support( 'responsive-embeds' );

	// feedの自動生成
	add_theme_support( 'automatic-feed-links' );

	// 抜粋のサポート
	add_theme_support( 'excerpt' );
   
    // クラシックウィジェットに戻す
    remove_theme_support( 'widgets-block-editor' );
	// HTML5に対応させる
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'search-form',
			'navigation-widgets',
		)
	);
        // 選択可能な更新ウィジェットのカスタマイズに対応
		add_theme_support( 'customize-selective-refresh-widgets' );

		// ブロックのスタイルに対応
		add_theme_support( 'wp-block-styles' );

		// 大きい画像に対応
		add_theme_support( 'align-wide' );

		// エディターのスタイルに対応
		add_theme_support( 'editor-styles' );
    register_nav_menus( array(
        'global-nav' => 'グローバルナビゲーション',
    ) );
   get_template_part('includes/breadcrumb');
   get_template_part('includes/ogp-tags');
}
add_action('after_setup_theme', 'my_theme_setup' );

function load() {
$theme_dir = get_template_directory_uri();
wp_enqueue_style('main', $theme_dir.'/style.css', array(), '0.9.9');
wp_enqueue_style('bs-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array());
wp_enqueue_style('highlightjs', 'https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.9.0/build/styles/default.min.css', array());
wp_enqueue_script( 'wp-color-picker' );
wp_enqueue_style( 'wp-color-picker' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'load');
?>
