<?php

function webpanelyAutoload($class_name) {
    $paths = array(
        'library/webpanely/',
        'library/dibi/',
    );
    foreach ($paths as $path) {
        if (file_exists($path . $class_name . '.class.php')) {
            require_once $path . $class_name . '.class.php';
            break;
        }
    }
}

spl_autoload_register('webpanelyAutoload');
include 'library/dwoo/dwooAutoload.php';