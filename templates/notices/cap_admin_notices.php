<?php

add_action('cap_admin_notices', function($type, $text){
    echo '<div class="notice notice-' . $type . ' is-dismissible">
            <p>' . $text . '</p>
          </div>';
}, 10, 2);
