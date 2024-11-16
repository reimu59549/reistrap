<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Kiwi+Maru&family=Kosugi+Maru&family=M+PLUS+Rounded+1c&family=Mochiy+Pop+One&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&family=Sawarabi+Gothic&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&family=Zen+Old+Mincho&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container">
<header class="header">
<div class="header__inner">
    <h1 class="site-name"><a class="sitename-nav" href="<?php echo home_url(); ?>"><?php bloginfo("name"); ?></a></h1>
               <?php
                    if ( has_nav_menu( 'global-nav' ) ) {
                        wp_nav_menu(array(
                            'theme_location' => 'global-nav',
                            'menu_class' => 'global-nav__list',
                            'container' => 'nav',
                            'container_class' => 'global-nav',
                            'depth' => 1,
                        ));
                    }
                ?>
                <button class="header__hamburger hamburger" id="js-hamburger">
                <span></span>
                <span></span>
                <span></span>
                </button>
</div>
</header>
<?php wp_footer(); ?>