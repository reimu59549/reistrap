<?php
/*
このファイルは、カスタマイズに項目を追加するファイルです。
このファイルにより、サイトのスタイルなどをカスタマイズから制御できます。
*/
function my_customize( $wp_customize ) {

	$wp_customize->add_panel(
		'my_panel',
		array(
			'title'    => 'スタイル',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_section(
		'my_section',
		array(
			'title'    => '背景色',
			'panel'    => 'my_panel',
			'priority' => 1,
		)
	);
	
$wp_customize->add_setting( 'my_setting_colorpicker' );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'my_control_colorpicker',
		array(
			'label'    => '背景色を選択してください。',
			'section'  => 'my_section',
			'settings' => 'my_setting_colorpicker',
		)
	)
);

}
add_action( 'customize_register', 'my_customize' );

function accent_color( $wp_customize ) {
	
	$wp_customize->add_section(
		'acec',
		array(
			'title'    => 'メインの色',
            'default' => '#4169e1',
			'panel'    => 'my_panel',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_setting( 'acccl' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'accent_color',
			array(
				'label'    => 'メインの色(アクセントカラー)を指定して下さい。',
				'section'  => 'acec',
				'settings' => 'acccl',
                'type'     => 'color',
				'priority' => 1,
			)
		)
	);
}
add_action( 'customize_register', 'accent_color' );

function head_cd_panansec($wp_customize) {
	$wp_customize->add_panel(
		'reistrap_other',
		array(
			'title'    => 'その他',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_section(
		'head_cod_sec',
		array(
			'title'    => 'headタグ用コード',
			'panel'    => 'reistrap_other',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_setting( 'head_code' );
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control(
			$wp_customize,
			'my_control',
			array(
				'label'    => 'headタグに追加するコード(HTML)を入力して下さい。',
				'section'  => 'head_cod_sec',
				'settings' => 'head_code',
				'priority' => 1,
			)
		)
	);
}
add_action('customize_register', 'head_cd_panansec');

function enqueue_accent_color() {
	if ( get_theme_mod( 'acccl' ) ) {
		echo '<style type="text/css">'.':root{--accent-color:' . esc_attr( get_theme_mod( 'acccl' ) ) . ';}'.'</style>';
	}
}
add_action('wp_head', 'enqueue_accent_color');

// 背景色を適用
function setting_styles() {
	if ( get_theme_mod( 'my_setting_colorpicker' ) ) {
		echo '<style type="text/css">'.'body{background:' . esc_attr( get_theme_mod( 'my_setting_colorpicker' ) ) . ';}'.'</style>';
	}
}
add_action( 'wp_head', 'setting_styles' );

function enqueue_head_code() {
	if ( get_theme_mod( 'head_code' ) ) {
		echo get_theme_mod( 'head_code' );
	}
}
add_action('wp_head', 'enqueue_head_code');

function reistrap_google_fonts( $wp_customize ) {
	$wp_customize->add_section(
		'fonts',
		array(
			'title'    => 'フォント',
			'panel'    => 'my_panel',
			'priority' => 1,
		)
	);
    $wp_customize->add_setting( 'my_theme_font_family', array(
        'default'           => 'Noto Sans JP',
    ) );

    $wp_customize->add_control( 'my_theme_font_family', array(
        'label'    => 'フォント(アルファベットの名前を入力して下さい。)フォントはGoogle Fontsから取得しています。フォント名は右のいずれかのみ入力して下さい。[Zen Old Mincho, Zen Maru Gothic, Zen Kaku Gothic New, Sawarabi Gothic, Noto Serif JP, Noto Sans JP, Mochiy Pop One, M PLUS Rounded 1c, Kosugi Maru, Kiwi Maru, Kaisei Decol]。',
        'section'  => 'fonts',
        'type'     => 'select',
			'choices'  => array(
				'Zen Old Mincho' => 'Zen Old Mincho',
				'Zen Maru Gothic' => 'Zen Maru Gothic',
				'Zen Kaku Gothic New' => 'Zen Kaku Gothic New',
				'Sawarabi Gothic' => 'Sawarabi Gothic',
				'Noto Serif JP' => 'Noto Serif JP',
				'Noto Sans JP' => 'Noto Sans JP',
				'Mochiy Pop One' => 'Mochiy Pop One',
				'M PLUS Rounded 1c' => 'M PLUS Rounded 1c',
				'Kosugi Maru' => 'Kosugi Maru',
				'Kiwi Maru' => 'Kiwi Maru',
				'Kaisei Decol' => 'Kaisei Decol',
			),
    ) );
}
add_action( 'customize_register', 'reistrap_google_fonts' );

function my_theme_customize_fonts() {
    ?>
    <style>
        body {
            font-family: "<?php echo esc_html( get_theme_mod( 'my_theme_font_family' ) ); ?>";
        }
    </style>
    <?php
}
add_action( 'wp_head', 'my_theme_customize_fonts' );
?>