<?php


/**
 * Plugin Name: Alchemist Plugin
 * Plugin URI: https://abhijitsarker.github.io/my-portfolio/
 * Description: This is my second time developing a plugin.
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Abhijit Sarker
 * Author URI: https://abhijitsarker.github.io/my-portfolio/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://example.com/my-plugin/
 * Text Domain: alchemist
 * Domain Path: /languages
 */

/*
{Alchemist} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Alchemist} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Alchemist}. If not, see {URI to Plugin License}.
*/

if (!defined('ABSPATH')) {
    die;
}  //option 1

// defined('ABSPATH') or die('you cant acces this file'); //option 2

// if (!function_exists('add_action')) {
//     echo 'cant access this file';
//     exit;
// } //option 3

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
