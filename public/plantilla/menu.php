<?php

require_once '../app/rutas.php';
sesion::init();

if(!sesion::isSetVal("menu")){
    include_once 'menu/defecto.php';
}
else if(sesion::getValue("menu") == 0){
    include_once 'menu/tipo1.php';
}

else if(sesion::getValue("menu") == 1){
    include_once 'menu/tipo2.php';
}

