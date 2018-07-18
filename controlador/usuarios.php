<?php

require_once '../app/rutas.php';

function validarUsuario($cedula, $contrasena){
    
    $usuarioModelo = new usuarios();
    $resultado = $usuarioModelo->existe($cedula, $contrasena);
    return $resultado;
    
}

function cambiarContrasena($a,$b){
    
    $usuarioModelo = new usuarios();
    $resultado = $usuarioModelo->aContrasena($a,$b);
    return $resultado;
    
}

if($_POST){
    
    if(isset($_POST['cedula']) && isset($_POST['contrasena']) && isset($_POST['menu'])){
        $cedula = $_POST['cedula'];
        $contrasena = $_POST['contrasena'];
        $url = "modulo-fiestas.php";
        $menu = $_POST['menu'];
        $resultado = validarUsuario($cedula, $contrasena);
        
        if($resultado == 0){
            $respuesta =  "Datos no válidos";
        }
        else{
            
            sesion::setValue("cedula", $cedula);
            sesion::setValue("tipo", $resultado['tipo']);
            
            if($_POST['menu'] == 0){
                sesion::setValue("menu", 0);
            }
            
            if($_POST['menu'] == 1){
                sesion::setValue("menu", 1);
            }
            
            header('Location: '.$url);
        }
    }
    
    if(isset($_POST['contrasena']) && isset($_POST['cambiar'])){
        
        $cedula = sesion::getValue("cedula");
        $contrasena = md5($_POST['contrasena']);
        
        $res = cambiarContrasena($cedula, $contrasena);
        
        if($res == 1){
            echo "<script>alert('Contrasena cambiada'); window.location.replace('contrasena.php');</script>";
        }
        else{
            echo "<script>alert('Error al cambiar la contrasena'); window.location.replace('contrasena.php');</script>";   
        }
        
    }
}
