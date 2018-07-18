<?php

require_once '../app/rutas.php';
sesion::init();

function consultarTodosProductos(){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->listarTodos();
    return $resultado;
    
}

$res = consultarTodosProductos();
echo json_encode($res);

