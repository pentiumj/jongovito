<?php

require_once '../app/rutas.php';
sesion::init();

function agregarNoticia($a, $b, $c){
    
    $modeloNoticias = new noticias();
    $resultado = $modeloNoticias->agregar($a, $b, $c);
    return $resultado;
    
}

function mostrarNoticias(){
    $modeloNoticias = new noticias();
    $resultado = $modeloNoticias->mostrar();
    return $resultado;
}

if($_POST){
    
    if(
            isset($_POST['autor'])
         && isset($_POST['titulo'])
         && isset($_POST['editor1'])
      
       ){
        
        $autor = $_POST['autor'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['editor1'];
        
        if(agregarNoticia($autor, $titulo, $contenido) == 1){
            
            echo "<script>alert('Noticia agregada'); window.location.replace('noticias-listar.php');</script>";
            
        }
        
    }
    
}
