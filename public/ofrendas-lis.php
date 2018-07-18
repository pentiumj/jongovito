<?php 
    require_once '../app/rutas.php';
    sesion::init();
    
      if(!sesion::isSetVal("cedula")){
        $url = "error.php";
        header('Location: '.$url);
    }  
?>
<?php require_once '../controlador/oferentesProductos.php'; ?>

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
             
            <div class="ubi">Ofrendas >> Pendientes</div>
                <div class="titulo1">Ofrendas pendientes</div></br></br>
                
                <?php $totales = consultarOferentes(); ?>
                <?php 
                $productos = 0;
                foreach($totales as $key => $value){
                    
                    $productos += $totales[$key]["cantidad"]; 
                }
                
                $personas = array();
                foreach($totales as $key => $value){
                    
                    $personas[] = $totales[$key]["identificacion"]. ""; 
                    
                }
                
                
                ?>
                <h3>Número de registros: <?= count($totales); ?></h3>
                <h3>Recibieron en total: <?= $productos." productos"; ?></h3>
                <h3>Deben en total: <?php echo ($productos*2)." productos"; ?></h3>
                <h3>Número de personas: <?= count(array_unique($personas)); ?></h3>
                
                
                <script>
                    
                   jQuery(function($){
                            $('.table').footable({
                                    "columns": $.getJSON('columnasOfrendas.php'),
                                    "rows": $.getJSON('filasOfrendas.php'),
                                    "filtering": {
                                            "enabled": true
                                    }
                            });
                    });
                    
                    function ira(a,b,c){
                        if(confirm("¿Seguro desea borrar el registro?")){
                            window.location.replace('eliminarOP.php?identificacion='+a+'&producto_id='+b+'&fecha='+c);
                        }else{
                            return false;
                        }
                    }
                    
                    function actualizar(a,b,c){
                        if(confirm("¿Marcar como entregado?")){
                            window.location.replace('estadoOP.php?identificacion='+a+'&producto_id='+b+'&fecha='+c);
                        }
                        else{
                            return false;
                        }
                        
                    }

                </script>
                
                <div class="datagrid">
                    <table class="table" data-filtering="true" 
                    data-filter-position="left" 
                    data-paging="true"
                    data-filterable="false">
                    </table>
                </div>
                

                    
                
                
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>