<?php

/**
 * Core class
 */
class FreeFunnel
{
    protected $loader;
    protected $plugin_name = 'FreeFunnel';
    protected $version;

    // Core Method
    public function __construct()
    {
        //set version
        if (defined('PLUGIN_NAME_VERSION')) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0b';
        }
    }

    public function run()
    {

        function menu_html()
        {
?>
            <h1 style="font-size: 100px;">HOE</h1>
<?php
        }
        function add_menu_page1()
        {
            add_menu_page(
                "FreeFunnel",
                "FreeFunnel",
                'manage_options',
                'freefunnel_dashboard',
                'menu_html',
                plugin_dir_url(__FILE__) . '../admin/assets/icon.png',
                20
            );

            add_submenu_page(
                "freefunnel_dashboard",
                "Flows",
                "Flows",
                'manage_options',
                'freefunnel_flows',
                'menu_html'
            );
        }
        add_action('admin_menu', 'add_menu_page1');
    }
}
