<?php

require_once '../app/rutas.php';

$term = trim(strip_tags($_GET['term']));

$productoModelo = new productos();
$productos = $productoModelo->consultar($term);
echo json_encode($productos);

