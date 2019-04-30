<?php

if(!class_exists('Cap_submenu_page')){
    class Cap_submenu_page{
        public function render(){
            include_once( plugin_dir_path(__FILE__) . 'templates/archives.php');
        }
    }
}