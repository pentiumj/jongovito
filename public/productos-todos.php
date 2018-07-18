<?php 
    require_once '../app/rutas.php';
    sesion::init();
    
      if(!sesion::isSetVal("cedula")){
        $url = "error.php";
        header('Location: '.$url);
    }  
?>

<?php require_once "./plantilla/metas.php"; ?>
           
    <title>Módulo de fiestas patronales</title>
        
    <?php require_once "./plantilla/scripts-css.php"; ?>
    <?php require_once "./plantilla/autocompletado.php" ?>
    
    <?php require_once '../controlador/productos.php'; ?>
    
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
            <h3>Módulo de fiestas patronales de SITJO</h3>
             
            <div class="ubi">Ofrendas >> Todos</div>
                <div class="titulo1">Listar todos los productos inscritos</div></br></br>
                
                <h3>Número de productos: <?= count(consultarTodosProductos()); ?></h3>
                
                <script>
                    
                   jQuery(function($){
                            $('.table').footable({
                                    "columns": $.getJSON('columnasEntregados.php'),
                                    "rows": $.getJSON('filasEntregados.php'),
                                    "filtering": {
                                            "enabled": true
                                    }
                            });
                    });

                </script>
                
                <div class="datagrid">
                    <table class="table" data-filtering="true" 
                    data-filter-position="left" 
                    data-paging="true"
                    data-filterable="false"></table>
                </div>
                
                

                    
                
                
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>