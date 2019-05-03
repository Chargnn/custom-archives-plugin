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

        /**
         * Add actions
         */
        public function init(){
            // Add the menu to the admin page
            add_action('admin_menu', [$this, 'add_options_page']);

            // Register the field group for the form in this page
            add_action('admin_init', [$this,'register_field_groups']);
        }

        /**
         * Register field groups for the archive form
         */
        public function register_field_groups() {
            $post_types = cap_get_post_types();

            // Register each fields in the field group
            foreach($post_types as $post_type) {
                register_setting('cap-field-group', 'cap_wysiwyg_' . $post_type . '_archive');
            }
        }

        /**
         * Add the page to the admin page
         */
        public function add_options_page()
        {
            // Add option page with given Page_Renderer
            add_options_page(
                'Archives',
                'Archives',
                'manage_options',
                'cap_archives',
                [$this->page_renderer, 'render_archive']
            );
        }

    }
}