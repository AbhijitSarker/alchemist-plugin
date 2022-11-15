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



// if(!defined('ABSPATH')){
//     die;
// }  //option 1

// defined('ABSPATH') or die('you cant acces this file'); //option 2

if (!function_exists('add_action')) {
    echo 'cant access this file';
    exit;
} //option 3

class AlchemistPlugin
{
    function __construct()
    {
    }

    function activate()
    {
        //generate a CPT
        //flush rewrite rules
    }

    function deactivate()
    {
        //flush rewrite rules
    }

    function unstall()
    {
        //delete cpt
        //delete all data
    }
}

if (class_exists('AlchemistPlugin')) {
    $alchemistPlugin = new AlchemistPlugin();
}


//activation
register_activation_hook(__FILE__, array($alchemistPlugin, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($alchemistPlugin, 'deactivate'));
//uninstall
