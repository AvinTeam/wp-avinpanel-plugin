<?php
defined('ABSPATH') || exit;

add_filter('gettext', 'change_woocommerce_to_froshghah', 999999999999, 3);
function change_woocommerce_to_froshghah($translated_text, $text, $domain)
{

    // echo $translated_text . '<br>';
    // if ($text == 'WooCommerce') {
    //     $translated_text = 'فروشگاه';
    // }

    $translated_text = str_replace("WooCommerce", "فروشگاه", $translated_text);
    $translated_text = str_replace("ووکامرس", "فروشگاه", $translated_text);
    return $translated_text;
}