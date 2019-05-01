<?php

/**
 * Get the post_type wysiwyg text from option table
 *
 * @param $post_type_name
 * @return mixed
 */
function cap_field($post_type_name)
{
    return get_option('cap_wysiwyg_' . $post_type_name . '_archive');
}