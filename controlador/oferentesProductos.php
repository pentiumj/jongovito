<?php

require_once '../app/rutas.php';

date_default_timezone_set('America/Bogota');

function agregarOferente($a, $b, $c, $d){
    
    $oferentesModelo = new oferentes();
    $resultado = $oferentesModelo->agregar($a, $b, $c, $d);
    return $resultado;
    
}

function actualizarOferente($a,$b){
    
    $oferentesModelo = new oferentes();
    $resultado = $oferentesModelo->actualizar($a,$b);
    return $resultado;
    
}

function existeOferente($a){
    
    $oferentesModelo = new oferentes();
    $resultado = $oferentesModelo->existe($a);
    return $resultado;
    
}

function consultarOferentes($a=null){
    
    $opModelo = new oferentesProductos();
    $resultado = $opModelo->consultar($a);
    return $resultado;
    
}

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

function agregarOP($a,$b,$c,$d){
    
    $OFModelo = new oferentesProductos();
    $resultado = $OFModelo->agregar($a,$b,$c,$d);
    return $resultado;
     
}

function exiteOP($a,$b){
    $OFModelo = new oferentesProductos();
    $resultado = $OFModelo->existe($a,$b);
    return $resultado;
}

function agregandoProductos($productos, $identificacion, $cantidad, $fecha, $ban){
    
    foreach($productos as $key => $value){
                
        if(existeProductos($value) == 0){ //Si no existe un producto ingresado se agrega

            agregarProductos($value);

            $resProductos = existeProductos($value);//Sacar id de producto
            $producto_id = $resProductos['id'];

        }
        else{

            $resProductos = existeProductos($value);//Sacar id de producto
            $producto_id = $resProductos['id'];

        }

        if(agregarOP($identificacion, $producto_id, $cantidad[$key], $fecha) != 1){
            $ban = 1;
        }

    }
    
    return $ban;
    
}

if($_POST){
    
    if(
            !isset($_POST['existente'])
            &&isset($_POST['iden']) 
            && isset($_POST['nombres'])
            && isset($_POST['apellidos'])
            && isset($_POST['producto'])
            && isset($_POST['cantidad'])
      ){
        
        $identificacion = $_POST['iden'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        
        if(isset($_POST['celular'])){
            $celular = $_POST['celular'];
        }else{
            $celular = "";
        }
            
        $productos = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $fecha = date("Y-m-d H:i:s");
        $ban = 0;
        //$anio = date("Y");
                
                        
        //if(exiteOP($identificacion,$anio) == 0){ //Si oferente no tiene productos este año
            
        if(existeOferente($identificacion) == 0){ //Si no existe oferente se agrega
            
            agregarOferente($identificacion, $nombres, $apellidos, $celular);
            
            $ban = agregandoProductos($productos, $identificacion, $cantidad, $fecha, $ban);
            
            if($ban == 0){
                echo "<script>alert('Usuario y productos agregados'); window.location.replace('ofrenda.php');</script>";       

            }
        }
        else{
            echo "<script>alert('ERROR: El usuario ya existe'); window.location.replace('ofrenda.php');</script>";
        }
        
        
    }

    if(
            isset($_POST['existente'])
            && isset($_GET['iden']) 
            && isset($_POST['nombres'])
            && isset($_POST['apellidos'])
            && isset($_POST['producto'])
            && isset($_POST['cantidad'])
            && (existeOferente(($_GET['iden'])) != 0)
            
      ){
        
        $identificacion = $_GET['iden'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        
        if(isset($_POST['celular'])){
            $celular = $_POST['celular'];
        }else{
            $celular = "";
        }
        
        $productos = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $fecha = date("Y-m-d H:i:s");
        $ban = 0;
        
        $ban = agregandoProductos($productos, $identificacion, $cantidad, $fecha, $ban);
        
        if($ban == 0){
            echo "<script>alert('Productos agregados'); window.location.replace('ofrenda.php');</script>";
        }
            
        
    }
}
