<?php

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        //enqueue all our script
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assests/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assests/myscript.js');
    }
}
