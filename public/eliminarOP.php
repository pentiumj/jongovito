<?php

require_once '../app/rutas.php';
sesion::init();

if(!isset($_GET['identificacion']) || !isset($_GET['producto_id'])){
    $url = "modulo-fiestas.php";
    header("Location:". $url);
}
?>

<?php
function eliminarOP($a,$b,$c){
    
    $OPmodelo = new oferentesProductos();
    $res = $OPmodelo->eliminar($a,$b,$c);
    return $res;
}

$of_id = $_GET['identificacion'];
$pr_id = $_GET['producto_id'];
$fe = $_GET['fecha'];

$res = eliminarOP($of_id, $pr_id, $fe);

if($res == 1){
    echo "<script>"
        ."alert('Registro eliminado');"
        ."window.location.replace('ofrendas-lis.php')"
        ."</script>";
}
else{
    echo "<script>"
        ."alert('Error al eliminar');"
        ."window.location.replace('ofrendas-lis.php')"
        ."</script>";
}