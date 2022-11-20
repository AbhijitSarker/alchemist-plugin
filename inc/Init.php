<?php

namespace Inc;

final class Init
{
    // store all the classes inside an array 
    //return full list of classes
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class

        ];
    }

    //loop through the classes, initialize them and 
    //call the register method if it exists
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    //initialixe the class 
    //param class $class       class from the service array
    //return class instance    new instance of the class
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}



// use Inc\Base\Activate;
// use Inc\Base\Deactivate;

// use Inc\Pages\Admin;

// if (!class_exists('AlchemistPlugin')) {

//     class AlchemistPlugin
//     {
//         public $plugin;
//         function __construct()
//         {
//             $this->plugin  = plugin_basename(__FILE__);
//         }

//         function register()
//         {
//             add_action('admin_enqueue_scripts', array($this, 'enqueue'));

//             add_action('admin_menu', array($this, 'add_admin_pages'));

//             add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//         }

//         public function settings_link($links)
//         {
//             //add custom settings links
//             $settings_link = '<a href="admin.php?page=alchemist_plugin">Settings</a>';
//             array_push($links, $settings_link);
//             return $links;
//         }

//         public function add_admin_pages()
//         {
//             add_menu_page('Alchemist Plugin', 'Alchemist', 'manage_options', 'alchemist_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
//         }

//         public function admin_index()
//         {
//             // requre template
//             require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//         }

//         protected function create_post_type()
//         {
//             add_action('init', array($this, 'custom_post_type'));
//         }

//         function custom_post_type()
//         {
//             register_post_type('book', ['public' => true, 'label' => 'Books']);
//         }

//         function enqueue()
//         {
//             //enqueue all our script
//             wp_enqueue_style('mypluginstyle', plugins_url('/assests/mystyle.css', __FILE__));
//             wp_enqueue_script('mypluginscript', plugins_url('/assests/myscript.js', __FILE__));
//         }

//         function activate()
//         {
//             // require_once plugin_dir_path(__FILE__) . 'inc/alchemist_plugin_activate.php';
//             Activate::activate();
//         }
//     }

//     $alchemistPlugin = new AlchemistPlugin();
//     $alchemistPlugin->register();
// }


// //activation
// // require_once plugin_dir_path(__FILE__) . 'inc/alchemist_plugin_activate.php';
// register_activation_hook(__FILE__, array($alchemistPlugin, 'activate'));

// //deactivation

// // require_once plugin_dir_path(__FILE__) . 'inc/Deactivate.php';
// register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

// //uninstall
// // register_uninstall_hook(__FILE__, array($alchemistPlugin, 'uninstall'));
