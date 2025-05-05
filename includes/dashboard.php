<?php
defined('ABSPATH') || exit;

function change_wp_about_link($wp_admin_bar)
{
    $wp_logo_node = $wp_admin_bar->get_node('wp-logo');
    if ($wp_logo_node) {
        $wp_logo_node->href = 'https://avinmedia.ir/'; // لینک جدید
        $wp_admin_bar->add_node($wp_logo_node);
    }
}

add_action('admin_bar_menu', 'change_wp_about_link', 999);

function change_footer_admin_link()
{
    return '<a href="https://avinmedia.ir/" target="_blank">طراحی و پشتیبانی: گروه هنری رسانه ای آوین</a>';
}
add_filter('admin_footer_text', 'change_footer_admin_link');

// غیرفعال کردن ویجت‌های پیش‌فرض وردپرس در داشبورد
function disable_default_dashboard_widgets()
{
    remove_meta_box('dashboard_primary', 'dashboard', 'side');          // اخبار و رویدادهای وردپرس
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');        // سایر اخبار وردپرس
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');      // انتشار سریع
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');    // پیش‌نویس‌های اخیر
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');       // فعالیت اخیر
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal'); // Yoast
    remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal');       // Gravity
    remove_meta_box('GFPersian_RSS', 'dashboard', 'side');              // Gravity Persian
    remove_meta_box('persian_woocommerce_feed', 'dashboard', 'normal'); // woocommerce
    remove_meta_box('e-dashboard-overview', 'dashboard', 'normal'); // elementor

   
}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 9999);
