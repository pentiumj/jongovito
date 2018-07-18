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
    
    <script src="js/modal.js"></script>
    <script src="js/productos.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script src="js/ckeditor/plugins/imageuploader/plugin.js"></script>
    
    
        
    </head>
    <body>
        <div id="contenedor">
                       
            <?php require_once "./plantilla/cabecera.php"; ?>
            <?php require_once "./plantilla/menu.php"; ?>
           
        <div id="contenedorSup">
            
        </div>            
            
        <div id="contenedorInf"> 
            <h3>Módulo de noticias de SITJO</h3>
            
             
            <div class="ubi">Noticias >> Agregar</div>
                <div class="titulo1">Agregar noticia</div></br></br>
                
                    
                    <form method="POST">
                        
                        <input type="text" name="autor" placeholder="Autor" required="required">
                        <input type="text" name="titulo" placeholder="Título" required="required">
                        <div style="clear:both">
                        
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                            This is my textarea to be replaced with CKEditor.
                        </textarea>
                        
                        
                        <button id="enviarB" type="submit">Agregar</button>
                        
                    </form>
                    
                <script>
                            
                    CKEDITOR.replace( 'editor1', {
                        filebrowserBrowseUrl: 'js/ckeditor/plugins/imageuploader/imgbrowser.php',
                        filebrowserImageBrowseUrl: 'js/ckeditor/plugins/imageuploader/imgbrowser.php'
                    });
                    CKEDITOR.config.extraPlugins = 'imageuploader';
                    
                    
                    //C:\xampp\htdocs\sitjo\public\js\ckeditor\plugins\imageuploader\imgupload.php

                </script>
                
                
            
        </div>        
            <?php require_once './plantilla/pie.php'; ?>
            
        </div>
            <?php require_once './plantilla/analytics.php'; ?>
    </body>
    
</html>