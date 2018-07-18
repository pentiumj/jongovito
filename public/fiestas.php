<?php session_start(); ?>
<?php 
    require_once '../app/rutas.php';
    require_once CONTROLADOR . 'usuarios.php';
    
    if(sesion::isSetVal("cedula")){
        $url = "modulo-fiestas.php";
        header('Location: '.$url);
    }  
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
            
        <div id="contenedorInf" id="formIngreso"> 
            <h3 class="centrado">Ingreso al módulo de fiestas patronales de SITJO</h3>
            
            <form method="POST" id="formuingreso">
                <label for="usuario">Usuario</label>
                <input type="text" name="cedula" id="cedula" required="required" placeholder="Ej: 12345678">
                <label for="usuario">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" required="required" placeholder="Contraseña">
                <input type="hidden" name="menu" value="0">
                <input type="submit" value="Ingresar">
            </form>
            
            <div id="respuestas">
                <?php if(isset($respuesta)){ 
                    echo $respuesta;} 
                ?>
            </div>
                       
        </div>        
            <?php include './plantilla/pie.php'; ?>
            
        </div>
            <?php include './plantilla/analytics.php'; ?>
    </body>
    
</html>

