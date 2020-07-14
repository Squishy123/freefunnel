<?php

require plugin_dir_path(__FILE__) . 'templates/alerts.php';
require plugin_dir_path(__FILE__) . 'actions/posts.php';
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

        //register flow type
        create_flow_init();
    }

    public function run()
    {

        function menu_html()
        {
            if (isset($_POST['alert'])) {
                createPost("Sample Page", "sample_page");
                add_admin_success_alert("You've been alerted!");
            }

?>
            <h1 style="font-size: 100px;">PAGES</h1>
            <?php
            $pages = get_pages();
            foreach ($pages as $page) {
                echo '<p><a href="/'.$page->post_name.'">'.$page->post_title.'</a></p>';
            }
            ?>
            <form method="POST">
                <input type="hidden" name="alert" value="true">
                <?php submit_button('Create Page') ?>
            </form>

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
                "Settings",
                "Settings",
                'manage_options',
                'freefunnel_settings',
                'menu_html'
            );
        }
        add_action('admin_menu', 'add_menu_page1');
    }
}
