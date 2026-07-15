<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logoNM.svg" alt="<?php bloginfo('name'); ?>">
        </a>
    </div>

    <nav class="main-nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-principal',
            'container'      => false,
        ));
        ?>
    </nav>

    <button id="mobile-menu-toggle" class="mobile-menu-toggle">☰</button>
</header>

<div id="mobile-menu" class="mobile-menu">
    <button id="mobile-menu-close" class="mobile-menu-close">&times;</button>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-principal',
        'container'      => false,
    ));
    ?>
</div>