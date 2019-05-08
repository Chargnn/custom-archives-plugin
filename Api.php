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
    return apply_filters('cap_post_types_array', '');
}