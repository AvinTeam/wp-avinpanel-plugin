<?php

defined('ABSPATH') || exit;

// 1. تغییر آدرس در لینک‌های سایت
add_filter('site_url', 'custom_login_site_url', 10, 3);
function custom_login_site_url($url, $path, $scheme) {
    if ($path === 'wp-login.php') {
        return home_url('/avin-panel/', $scheme);
    }
    return $url;
}

// 2. تغییر آدرس خروج
add_filter('logout_url', 'custom_logout_url', 10, 2);
function custom_logout_url($logout_url, $redirect) {
    return str_replace('wp-login.php', 'avin-panel', $logout_url);
}

// 3. مدیریت درخواست‌های avin-panel
add_action('parse_request', 'handle_avin_admin_request');
function handle_avin_admin_request($wp) {
    if (!isset($_SERVER['REQUEST_URI'])) {
        return;
    }

    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if (trim($request, '/') === 'avin-panel') {
        // تعریف متغیرهای مورد نیاز wp-login.php
        global $error, $interim_login, $action, $user_login;
        
        $error = isset($_REQUEST['error']) ? $_REQUEST['error'] : '';
        $interim_login = isset($_REQUEST['interim-login']);
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
        $user_login = isset($_REQUEST['log']) ? $_REQUEST['log'] : '';

        // تغییر مسیر POST به wp-login.php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once ABSPATH . 'wp-login.php';
            exit;
        }

        // نمایش صفحه لاگین
        require_once ABSPATH . 'wp-login.php';
        exit;
    }
}

// 4. مسدود کردن دسترسی مستقیم به wp-login.php
add_action('login_init', 'block_wp_login_access');
function block_wp_login_access() {
    if ($_SERVER['SCRIPT_NAME'] === '/wp-login.php') {
        wp_redirect(home_url('/avin-panel/'));
        exit;
    }
}

// 5. اضافه کردن rewrite rule
add_action('init', 'add_login_rewrite_rule');
function add_login_rewrite_rule() {
    add_rewrite_rule('^avin-panel/?$', 'wp-login.php', 'top');
}

// 6. فعال‌سازی rewrite rules
register_activation_hook(__FILE__, 'custom_login_activate');
function custom_login_activate() {
    add_login_rewrite_rule();
    flush_rewrite_rules();
}

// 7. غیرفعال کردن rewrite rules
register_deactivation_hook(__FILE__, 'custom_login_deactivate');
function custom_login_deactivate() {
    flush_rewrite_rules();
}