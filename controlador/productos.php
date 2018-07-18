<?php

require_once '../app/rutas.php';
sesion::init();


function agregarProductos($a){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->agregar($a);
    return $resultado;
     
}

function existeProductos($a){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->existe($a);
    return $resultado;
     
}

function consultarProductos(){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->listar();
    return $resultado;
    
}

function consultarTodosProductos(){
    
    $productosModelo = new productos();
    $resultado = $productosModelo->listarTodos();
    return $resultado;
    
}


if($_POST){
    
    if(isset($_POST['producto'])){
        $producto = trim($_POST['producto']);
      }


    if(existeProductos($producto) == 0){

        agregarProductos($producto);
        echo "<script>alert('Producto agregado'); window.location.replace('productos-reg.php');</script>";
    }
    else{
        echo "<script>alert('ERROR: El producto ya existe'); window.location.replace('productos-reg.php');</script>";
    }
}

