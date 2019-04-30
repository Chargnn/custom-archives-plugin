<?php

/**
 * Create the submenu item under 'Tools'
 */
if(!class_exists('Cap_submenu')){
    class Cap_submenu{

        private $submenu_page;

        public function __construct($submenu_page)
        {
            $this->submenu_page = $submenu_page;
        }

        public function init(){
            add_action('admin_menu', [$this, 'add_options_page']);
        }

        public function add_options_page(){
            add_options_page(
                'Archives',
                'Archives',
                'manage_options',
                'cap_archives',
                [$this->submenu_page, 'render']
            );
        }


    }
}