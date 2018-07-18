<?php 
    require_once '../app/rutas.php';
    include_once LIBS . 'leerMas.php';
    
?>
<?php require_once '../controlador/noticias.php'; ?>

<?php require_once "./plantilla/metas.php"; ?>
           
    <title>Módulo de Noticias de SITJO</title>
        
    <?php require_once "./plantilla/scripts-css.php"; ?>
    <?php require_once "./plantilla/autocompletado.php" ?>
    
    <link rel="stylesheet" href="css/formulario.css">
    
    <style>
        .ui-autocomplete-loading {
          background: white url("img/cargando.gif") right center no-repeat;
        }
    </style>
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/footable.bootstrap.css">
    <link rel="stylesheet" href="css/tabla.css">
    

    <script src="js/footable.js"></script>
    <script src="js/productos.js"></script>   
        
    </head>
    <body>
        <div id="contenedor">
                       
            <?php require_once "./plantilla/cabecera.php"; ?>
            <?php require_once "./plantilla/menu.php"; ?>
           
        <div id="contenedorSup">
            
        </div>            
            
        <div id="contenedorInf"> 
            <h3>Noticias en Jongovito</h3>
             
            <div class="ubi">Jongovito >> Noticias</div>
            
                <div id="noticias">
                    
                   <?php 
                   
                        $result = mostrarNoticias();
                        
                        while($filas = $result->fetch_assoc()){
                            
                            echo "<h1>" . $filas['titulo'] . "</h1>";
                            echo leerMas($filas['contenido']); 
                            echo "<div class=''>" . $filas['autor'] . "</div>";
                            echo "<a href='noticias-jongovito.php?id=" . $filas['id'] . "' target='_blank'>Leer más</a>";
                            echo "<div style='clear:both'></div>";
                            echo "<hr>";
                        }
  
                   ?>
                    
                </div>
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>