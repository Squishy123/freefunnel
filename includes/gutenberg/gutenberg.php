<?php

function add_zebra_category($categories, $post) {
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

function zebra_gutenberg_blocks() {
    wp_register_script('entry-form-js',get_template_directory_uri() . '/build/index.js', array('wp-blocks'));
    register_block_type('zebra/entry-form', array(
        'editor_script' => 'entry-form-js'
    ));
}

add_action('init', 'zebra_gutenberg_blocks');