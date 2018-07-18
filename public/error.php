<?php session_start(); ?>
<?php 
    require_once '../app/rutas.php';
    require_once CONTROLADOR . 'usuarios.php';
?>
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
                       
            Usted no tiene acceso a esta zona.
                       
        </div>        
            <?php include './plantilla/pie.php'; ?>
            
        </div>
            <?php include './plantilla/analytics.php'; ?>
    </body>
    
</html>

