<?php
/**
 * Mr Updater
 *
 * Plugin Name: پنل آوین
 * Plugin URI:  https://updater.mrrashidpour.com/
 * Description: پنل آوین.
 * Version:     1.2.2
 * Author:      Mohammadreza Rashidpour Aghamahali
 * Author URI:  https://mrrashidpour.com/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 6.5
 * Requires PHP: 7.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

defined('ABSPATH') || exit;
date_default_timezone_set('Asia/Tehran');

preg_match('/Version:\s*(.+)/i', file_get_contents(__FILE__), $versionMatches);

$version = $versionMatches[ 1 ] ?? 0;

define('AVIN_PANEL_VERSION', trim($version));

define('AVIN_PANEL_FILE', __FILE__);
define('AVIN_PANEL_PATH', plugin_dir_path(__FILE__));
define('AVIN_PANEL_INCLUDES', AVIN_PANEL_PATH . 'includes/');
define('AVIN_PANEL_VIEWS', AVIN_PANEL_PATH . 'views/');

define('AVIN_PANEL_URL', plugin_dir_url(__FILE__));
define('AVIN_PANEL_SHORT_CODE_STYLE', AVIN_PANEL_VIEWS . 'style/');
define('AVIN_PANEL_ASSETS', AVIN_PANEL_URL . 'assets/');
define('AVIN_PANEL_CSS', AVIN_PANEL_ASSETS . 'css/');
define('AVIN_PANEL_JS', AVIN_PANEL_ASSETS . 'js/');
define('AVIN_PANEL_IMAGE', AVIN_PANEL_ASSETS . 'images/');

flush_rewrite_rules();

// require_once AVIN_PANEL_INCLUDES . '/admin_url.php';
require_once AVIN_PANEL_INCLUDES . '/login.php';
require_once AVIN_PANEL_INCLUDES . '/style.php';
require_once AVIN_PANEL_INCLUDES . '/dashboard.php';
require_once AVIN_PANEL_INCLUDES . '/filter.php';

if (is_admin()) {

}

