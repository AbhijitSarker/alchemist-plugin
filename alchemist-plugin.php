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

use Inc\Activate;
use Inc\Deactivate;

if (!class_exists('AlchemistPlugin')) {

    class AlchemistPlugin
    {
        public $plugin;
        function __construct()
        {
            $this->plugin  = plugin_basename(__FILE__);
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));

            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        public function settings_link($links)
        {
            //add custom settings links
            $settings_link = '<a href="admin.php?page=alchemist_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages()
        {
            add_menu_page('Alchemist Plugin', 'Alchemist', 'manage_options', 'alchemist_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index()
        {
            // requre template
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            //enqueue all our script
            wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assests/myscript.js', __FILE__));
        }

        function activate()
        {
            // require_once plugin_dir_path(__FILE__) . 'inc/alchemist_plugin_activate.php';
            Activate::activate();
        }
    }

    $alchemistPlugin = new AlchemistPlugin();
    $alchemistPlugin->register();
}


//activation
// require_once plugin_dir_path(__FILE__) . 'inc/alchemist_plugin_activate.php';
register_activation_hook(__FILE__, array($alchemistPlugin, 'activate'));

//deactivation

require_once plugin_dir_path(__FILE__) . 'inc/Deactivate.php';
register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

//uninstall
// register_uninstall_hook(__FILE__, array($alchemistPlugin, 'uninstall'));
