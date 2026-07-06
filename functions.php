<?php

function nathalie_mota_register_menus() {
    register_nav_menus(array(
        'menu-principal' => 'Menu principal',
    ));
}
add_action('after_setup_theme', 'nathalie_mota_register_menus');

function nathalie_mota_enqueue_assets() {
    wp_enqueue_style('nathalie-mota-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_assets');