<?php
/*
Plugin Name: Custom archives pages
Description: Add custom archives field to add to your archives pages
Author: Alexis Coulombe
Version: 0.0.1
License: MIT Licence
*/

/*
Copyright 2019 Alexis Coulombe

Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons
to whom the Software is furnished to do so, subject to the
following conditions:

The above copyright notice and this permission notice shall
be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR
ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

defined('ABSPATH') or die;

// Require all dependencies
foreach (glob(plugin_dir_path(__FILE__) . '*.php') as $file) {
    require_once($file);
}

/**
 * Init plugin
 */
if (!class_exists('Cap_main')) {
    class Cap_main
    {
        /**
         * Run when the plugin is activated
         */
        public function cap_init()
        {
            // Check if plugin is compatible with current WP version
            global $wp_version;
            if (version_compare($wp_version, '4.9.10', '<')) {
                wp_die('<p>Your wordpress version has not been tested and might not work with this plugin!</p>');
            }
        }

        /**
         * Run when the plugin is ready and loaded
         */
        public function cap_load()
        {
            $admin_page = new Cap_admin_page(new Cap_page_renderer());
            $admin_page->init();
        }

        /**
         * Register style and scripts for the plugin
         */
        public function cap_enqueue()
        {
            wp_enqueue_style('capstyle', plugins_url('/assets/styles/style.css', __FILE__));
            wp_enqueue_script('capscript', plugins_url('/assets/scripts/script.js', __FILE__));
        }
    }
}

$cap_main = new Cap_main();

register_activation_hook(__FILE__, [$cap_main, 'cap_init']);
add_action('plugins_loaded', [$cap_main, 'cap_load']);
add_action('admin_enqueue_scripts', [$cap_main, 'cap_enqueue']);
