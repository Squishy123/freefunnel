<?php

function add_zebra_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'zebra-blocks',
                'title' => __('Zebra', 'zebra-blocks')
            )
        )
    );
}

add_filter('block_categories', 'add_zebra_category', 10, 2);

function zebra_gutenberg_blocks()
{
    wp_enqueue_script(
        'entry-form-js',
        plugins_url('freefunnel') . '/build/index.js',
        array('wp-blocks', 'wp-editor', 'wp-components'),
    );

    wp_localize_script('entry-form-js', 'zebra_settings', get_option( 'zebra_settings_option_name' ));

    register_block_type('zebra/entry-form', array(
        'editor_script' => 'entry-form-js'
    ));
}

add_action('init', 'zebra_gutenberg_blocks');
