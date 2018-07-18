<?php

require_once '../app/rutas.php';
sesion::init();

function consultarProductos(){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->listar();
    return $resultado;
    
}

$res = consultarProductos();
echo json_encode($res);

