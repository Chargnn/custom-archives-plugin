<?php

/**
 * Get the given post_type wysiwyg text from option table
 *
 * @param $post_type_name
 * @return mixed
 */
function cap_field($post_type_name)
{
    return get_option('cap_wysiwyg_' . $post_type_name . '_archive');
}

/**
 * Get all post_types and remove most of the built-in
 *
 * @return array
 */
function cap_get_post_types(){
    $post_types = get_post_types();
    $post_types = array_diff($post_types, ['attachment', 'revision', 'custom_css',
        'nav_menu_item', 'customize_changeset',
        'oembed_cache', 'user_request', 'wp_block']);

    return $post_types;
}