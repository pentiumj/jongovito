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
           
    <title>Módulo de fiestas patronales</title>
        
    <?php include "./plantilla/scripts-css.php"; ?>
        
    </head>
    <body>
        <div id="contenedor">
                       
            <?php include "./plantilla/cabecera.php"; ?>
            <?php include "./plantilla/menu.php"; ?>
           
        <div id="contenedorSup">
            
        </div>            
            
        <div id="contenedorInf">            
            <center>
            <h3>Bienvenido a SITJO</h3>
            <h3>Módulo de fiestas patronales de SITJO</h3>
            <img src="img/guagua-de-pan.jpg" border="1" style="max-width:300px; max-height:300px" width="100%" height="100%"/>
            </center>
                       
        </div>        
            <?php include './plantilla/pie.php'; ?>
            
        </div>
            <?php include './plantilla/analytics.php'; ?>
    </body>
    
</html>