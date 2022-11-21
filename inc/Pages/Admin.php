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
}
