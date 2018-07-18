<?php 
    require_once '../app/rutas.php';
    sesion::init();
    
      if(!sesion::isSetVal("cedula")){
        $url = "error.php";
        header('Location: '.$url);
    }  
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
            <h3>Módulo de Noticias de SITJO</h3>
             
            <div class="ubi">Noticias >> Listar</div>
                <div class="titulo1">Listar</div></br></br>
                
                                
                <script>
                    
                   jQuery(function($){
                            $('.table').footable({
                                    "columns": $.getJSON('columnasNoticias.php'),
                                    "rows": $.getJSON('filasNoticias.php'),
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