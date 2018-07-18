<?php 
    require_once '../app/rutas.php';
    sesion::init();
    
      if(!sesion::isSetVal("cedula")){
        $url = "error.php";
        header('Location: '.$url);
    }  
?>
<?php include_once '../controlador/usuarios.php'; ?>

<?php include "./plantilla/metas.php"; ?>
           
    <title>Sistema SITJO</title>
        
    <?php include "./plantilla/scripts-css.php"; ?>
        
    </head>
    <body>
        <div id="contenedor">
                       
            <?php include "./plantilla/cabecera.php"; ?>
            <?php include "./plantilla/menu.php"; ?>
           
        <div id="contenedorSup">
            
        </div>            
            
        <div id="contenedorInf">            
            <h3>Sistema SITJO</h3>
             
            <div class="ubi">Usuario >> Contraseña</div>
                <div class="titulo1">Cambiar contraseña</div></br></br>
                
                <div id="agregar">
                    <h2>Ingrese contraseña</h2>

                    <form method="POST">
                        
                        <input type="password" name="contrasena" id="contrasena" required placeholder="Contraseña nueva*">
                        <input type="hidden" name="cambiar" value="">
              
                        <button id="enviarB" type="submit">Cambiar</button>

                    </form>
                    
                    <small>*Campo obligatorio</small>
                    
                </div>
                       
        </div>        
            <?php include './plantilla/pie.php'; ?>
            
        </div>
            <?php include './plantilla/analytics.php'; ?>
    </body>
    
</html>