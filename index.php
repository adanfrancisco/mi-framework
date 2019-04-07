<?php

require_once 'ControllerInterface.php';
require_once 'RandController.php';
require_once 'NameController.php';
require_once 'MiFramework.php';
require_once 'Routes.php';



$miFramework = new MiFramework;
//var_dump($miFramework);
//RUTES


$miFramework->setRute('GET','rand/', RandController::class);
$miFramework->setRute('GET','rand/{min}', RandController::class);
//$miFramework->setRute('GET','rand/{min}', RandController::class);
$miFramework->setRute('GET','rand/{min}/{max}', RandController::class);

// POST espera min y max. si no están es 1 y 10 por defecto

/*
$miFramework->setRute('POST','rand/', RandController::class);

$miFramework->setRute('GET','name/', NameController::class);

$miFramework->setRute('POST','name/', NameController::class);*/
// Agregar mas controllers



echo $miFramework->run();

