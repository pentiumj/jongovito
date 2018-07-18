<?php

require_once '../app/rutas.php';
sesion::init();

function consultarOferentes(){
    
    $opModelo = new oferentesProductos();
    $resultado = $opModelo->consultar();
    return $resultado;
    
}

$res = consultarOferentes();
echo json_encode($res);

