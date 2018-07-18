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
             
            <div class="ubi">Ofrendas >> Entregados</div>
                <div class="titulo1">Productos pendientes entregados a personas</div></br></br>
                
                <?php 
                    $totales = consultarProductos();
                    $sum =0;
                    
                    foreach($totales as $key => $value){
                        
                        $sum += $value['contar'];
                        
                    }
                
                ?>
                <h3>Número de productos diferentes: <?= count(consultarProductos()); ?></h3>
                <h3>Número de productos totales: <?= $sum; ?></h3>
                
                <script>
                    
                   jQuery(function($){
                            $('.table').footable({
                                    "columns": $.getJSON('columnasProductos.php'),
                                    "rows": $.getJSON('filasProductos.php'),
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