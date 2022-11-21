<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Alchemist Plugin',
                'menu_title' => 'Alchemist',
                'capability' => 'manage_options',
                'menu_slug' => 'alchemist_plugin',
                'callback' => function () {
                    echo 'The Alchemist';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }
    public function register()
    {
        // add_action('admin_menu', array($this, 'add_admin_pages'));
        $this->settings->addPages($this->pages)->register();
    }

    // public function add_admin_pages()
    // {
    //     add_menu_page('Alchemist Plugin', 'Alchemist', 'manage_options', 'alchemist_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    // }

    // public function admin_index()
    // {
    //     require_once $this->plugin_path . 'templates/admin.php';
    // }
}
