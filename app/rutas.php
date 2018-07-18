<?php

    define("ROOT_DIR", "../");
    define("CONTROLADOR", ROOT_DIR.'controlador/');
    define("MODELO", ROOT_DIR.'modelo/');
    define("LIBS", ROOT_DIR.'libs/');
        
     
    $classesDir = array (
        ROOT_DIR.'modelo/',
        ROOT_DIR.'app/',
        ROOT_DIR.'libs/'
    );
    
    spl_autoload_register(function($class){
        global $classesDir;
        foreach ($classesDir as $directory) {
            if (file_exists($directory . $class . '.php')) {
                require_once ($directory . $class . '.php');
            }
        }
    });


    

