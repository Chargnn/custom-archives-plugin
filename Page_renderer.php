<?php

if(!class_exists('Cap_page_renderer')){
    class Cap_page_renderer{
        /**
         * Render the archive page
         */
        public function render_archive(){
            include_once( plugin_dir_path(__FILE__) . 'templates/archives.php');
        }
    }
}