<?php
defined('ABSPATH') || exit;

add_action('admin_enqueue_scripts', 'avin_panel_admin_script');

function avin_panel_admin_script()
{

    wp_enqueue_style(
        'avin_panel_admin',
        AVIN_PANEL_CSS . 'admin.css',
        [  ],
        AVIN_PANEL_VERSION
    );

}


add_action('wp_enqueue_scripts', 'avin_panel_script');

function avin_panel_script()
{

    wp_enqueue_style(
        'avin_panel_admin',
        AVIN_PANEL_CSS . 'admin.css',
        [  ],
        AVIN_PANEL_VERSION
    );

}
