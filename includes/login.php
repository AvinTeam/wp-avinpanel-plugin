<?php
defined('ABSPATH') || exit;

// تغییر لوگوی صفحه لاگین وردپرس
function avin_panel_login_logo()
{
    echo "<link rel='stylesheet' id='avin_panel_login-css' href='" . AVIN_PANEL_CSS . "admin.css?ver=" . AVIN_PANEL_VERSION . "' type='text/css' media='all' />";
    echo PHP_EOL;
}
add_action('login_head', 'avin_panel_login_logo');

// تغییر آدرس لینک لوگوی صفحه لاگین به صفحه اصلی سایت
function change_login_logo_url()
{
    return home_url(); // تغییر به آدرس سایت شما (مثلاً https://example.com)
}

add_filter('login_headerurl', 'change_login_logo_url');
