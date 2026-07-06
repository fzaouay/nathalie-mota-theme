<?php

function nathalie_mota_register_menus() {
    register_nav_menus(array(
        'menu-principal' => 'Menu principal',
    ));
}
add_action('after_setup_theme', 'nathalie_mota_register_menus');