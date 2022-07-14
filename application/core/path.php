<?php

function menu_open()
{
    $cut = explode("/", $_SERVER["REQUEST_URI"]);

    if ($cut[4] == 'admin' && $cut[5] == 'status.php') {
        echo "menu-open";
    } else if ($cut[4] == 'admin' && $cut[5] == 'application.php') {
        echo "menu-open";
    } else if ($cut[4] == 'admin' && $cut[5] == 'add_user.php') {
    }
}
function cut_headlink()
{
    $cut = explode("/", $_SERVER["REQUEST_URI"]);

    if ( $cut[5] == 'status.php') {
        echo "active";
    }
    if ( $cut[5] == 'application.php') {
        echo "active";
    }
    if ( $cut[5] == 'add_user.php') {
        echo "active";
    }
}
