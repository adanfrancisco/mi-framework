<?php

require_once 'ControllerInterface.php';
require_once 'RandController.php';
require_once 'MiFramework.php';



$miFramework = new MiFramework;
//var_dump($miFramework);
//RUTES

$miFramework->setRute('GET','/', RandController::class);
$miFramework->setRute('POST','/', RandController::class);
// Agregar mas controllers


//tomo el método utilizado para pegarle al framework
$method = $_SERVER['REQUEST_METHOD'];

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




