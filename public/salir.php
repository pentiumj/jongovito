<?php

require_once '../app/rutas.php';

sesion::init();
sesion::destroy();

header('location: fiestas.php');
