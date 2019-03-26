<?php

require_once 'ControllerInterface.php';
require_once 'RandController.php';
require_once 'MiFramework.php';



$miFramework = new MiFramework;
//var_dump($miFramework);
//RUTES

$miFramework->setRute('GET','/', RandController::class);
// POST espera min y max. si no están es 1 y 10 por defecto
$miFramework->setRute('POST','/', RandController::class);

// Agregar mas controllers


//tomo el método utilizado para pegarle al framework
$method = $_SERVER['REQUEST_METHOD'];
//var_dump($_POST);

// Según el metodo utilizado busco qeu devolver
// Según que metodo llamo a las funciones setadas

switch ($method) {
    case 'GET':
        echo $miFramework->get('/');
        break;
    case 'POST':
        echo $miFramework->post('/');
        break;
    
    default:
        # code...
        break;
}





