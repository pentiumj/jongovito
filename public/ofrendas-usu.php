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
            <div class="titulo1">Registrar <b>otro</b> compromiso de ofrenda</div></br></br>
                
                <div id="agregar">
                    <h2>Productos recibidos</h2>
                    
                    <?php $oferenteDats = existeOferente($_GET['iden']); ?>

                    <form method="POST" id="agregarForm" name="agregarForm">
                        <input type="text" name="iden" id="iden" value="<?php echo $oferenteDats['identificacion']; ?>" required placeholder="Identificacion*" readonly="readonly">
                        <input type="hidden" name="existente">
                        <input type="text" name="nombres" id="nombres" value="<?php echo $oferenteDats['nombres']; ?>" required placeholder="Nombres*" readonly="readonly">
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo $oferenteDats['apellidos']; ?>" required placeholder="Apellidos*" readonly="readonly">
                        <input type="text" name="celular" id="celular" value="<?php echo $oferenteDats['celular']; ?>" placeholder="Celular" readonly="readonly">
                        <input type="text" name="producto[]" class="producto" required placeholder="Producto recibido*">
                        <input type="text" name="cantidad[]" class="cantidad" required placeholder="Cantidad*" size="10%">
                        <label><a href="#" id="agregarProducto">Agregar otro producto</a></label>
                        
                        <div id="masProductos"></div>
                        

                        <button id="enviarB" type="submit">Agregar</button>
                        <span class="pequena">*Campos con asterisco son obligatorios</span><br>

                    </form>
                    
                </div>
                
                
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>