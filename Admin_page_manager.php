<?php

/**
 * Create the submenu item under 'Tools'
 */
if(!class_exists('Cap_admin_page')){
    class Cap_admin_page{

        private $page_renderer;

        public function __construct($page_renderer)
        {
            $this->page_renderer = $page_renderer;
        }

        public function init(){
            add_action('admin_menu', [$this, 'add_options_page']);
            add_action('admin_init', [$this,'register_field_groups']);
        }

        public function register_field_groups() {
            $post_types = get_post_types();
            $post_types = array_diff($post_types, ['attachment', 'revision', 'custom_css',
                'nav_menu_item', 'customize_changeset',
                'oembed_cache', 'user_request', 'wp_block']);

            foreach($post_types as $post_type) {
                register_setting('cap-field-group', 'cap_wysiwyg_' . $post_type . '_archive');
            }
        }

        public function add_options_page()
        {
            add_options_page(
                'Archives',
                'Archives',
                'manage_options',
                'cap_archives',
                [$this->page_renderer, 'render']
            );
        }

    }
}