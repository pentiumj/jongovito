<?php 
    require_once '../app/rutas.php';
    sesion::init();
    
      if(!sesion::isSetVal("cedula")){
        $url = "error.php";
        header('Location: '.$url);
    }  
?>
<?php require_once '../controlador/oferentes.php'; ?>

<?php require_once "./plantilla/metas.php"; ?>
           
    <title>Módulo de fiestas patronales</title>
        
    <?php require_once "./plantilla/scripts-css.php"; ?>
    <?php require_once "./plantilla/autocompletado.php" ?>
    
    <link rel="stylesheet" href="css/formulario.css">
    
    <style>
        .ui-autocomplete-loading {
          background: white url("img/cargando.gif") right center no-repeat;
        }
    </style>
    
    <script src="js/modal.js"></script>
    <script src="js/productos.js"></script>
    
        
    </head>
    <body>
        <div id="contenedor">
                       
            <?php require_once "./plantilla/cabecera.php"; ?>
            <?php require_once "./plantilla/menu.php"; ?>
           
        <div id="contenedorSup">
            
        </div>            
            
        <div id="contenedorInf"> 
            <h3>Módulo de fiestas patronales de SITJO</h3>
            
             
            <div class="ubi">Ofrendas >> Agregar compromiso</div>
                <div class="titulo1">Registrar compromiso de ofrenda</div></br></br>
                
                <div id="agregar">
                    <h2>Ingrese identificación</h2>

                    <form method="POST">
                        
                        <input type="text" name="iden" id="iden" required placeholder="Identificacion*">
              
                        <button id="enviarB" type="submit">Aceptar</button>

                    </form>
                    
                </div>
                
                
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>