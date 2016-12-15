<?php

function autoload($className) {
    $autoload = array('application/core','application/controllers','application/models','application/services');

    foreach($autoload as $path) {
        //$di = new RecursiveDirectoryIterator($system_root.$path);
        $di = new RecursiveDirectoryIterator($path);
        $files = new RecursiveIteratorIterator($di);
        $files->setMaxDepth(2);
        foreach ($files as $filename => $file) {
            if(basename($filename) == $className.'.php')
            {
                include $filename;
                return;
            }
        }
    }
}

spl_autoload_register('autoload');