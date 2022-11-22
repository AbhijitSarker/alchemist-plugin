<?php

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();


        $this->setPages();

        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Alchemist Plugin',
                'menu_title' => 'Alchemist',
                'capability' => 'manage_options',
                'menu_slug' => 'alchemist_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'alchemist_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'alchemist_cpt',
                'callback' => function () {
                    echo '<h1>CPT Manager</h1>';
                }
            ),

            array(
                'parent_slug' => 'alchemist_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'alchemist_taxonomies',
                'callback' => function () {
                    echo '<h1>Taxonomy Manager</h1>';
                }
            ),

            array(
                'parent_slug' => 'alchemist_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'alchemist_widgets',
                'callback' => function () {
                    echo '<h1>Widgets Manager</h1>';
                }
            )
        );
    }
}
