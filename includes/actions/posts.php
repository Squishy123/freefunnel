<?php
function create_flow_init()
{
    function registerType()
    {
        $args = array(
            'label' => 'Flows',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => "freefunnel_dashboard",
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'funnel'),
            'query_var' => true,
            'menu_icon' => 'dashicons-video-alt',
            'map_meta_cap' => true,
            //'show_in_rest' => true,
            'supports' => array(
                'editor',
                'title',
                'thumbnail',
                'slug',
                'custom-fields',
            )
        );
        register_post_type('flow', $args);
    }
    add_action('init', 'registerType');
}

function createPost($page_title, $page_name)
{
    wp_insert_post(array(
        'post_title'     => $page_title,
        'post_type'      => 'flow',
        'post_name'      => $page_name,
        'post_content'   => 'Flow Here!',
        'post_status'    => 'publish',
        'comment_status' => 'closed',
        'ping_status'    => 'closed',
        'post_author'    => 1,
        'menu_order'     => 0,
    ));
}
