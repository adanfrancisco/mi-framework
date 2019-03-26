<?php

require_once 'ControllerInterface.php';
require_once 'RandController.php';
require_once 'MiFramework.php';



$controller = new MiFramework;

//RUTES

$controller->setRute('GET','/', RandController::class);
$controller->setRute('POST','/', RandController::class);
//$controller->get('/')


//$controller->getRutes()
$method = $_SERVER['REQUEST_METHOD'];
var_dump($method);



if($method=='GET')
{
    echo $controller->get('/');
}
// segun que metodo llamo a las funciones setadas

var_dump($_POST);

