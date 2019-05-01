<?php

if(!class_exists('Cap_page_renderer')){
    class Cap_page_renderer{
        public function render_archive(){
            include_once( plugin_dir_path(__FILE__) . 'templates/Archives.php');
        }
    }
}