<?php

require_once '../app/rutas.php';
sesion::init();

function existeOf($a){
    
    $modeloOferente = new oferentes();
    $resultado = $modeloOferente->existe($a);
    return $resultado;
}

if($_POST){
    
    if($_POST['iden']){
        
         $identificacion = $_POST['iden'];
         $red1= "ofrendas-reg.php?iden=$identificacion";
         $red2= "ofrendas-usu.php?iden=$identificacion";
         
         if(existeOf($identificacion) == 0){
             
             header("Location: $red1");
             
         }
         else{
             header("Location: $red2");
         }
        
    }
        
        
}