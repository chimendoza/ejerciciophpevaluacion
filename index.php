<?php

error_reporting(E_ALL && ~E_NOTICE);


//obtención de controlador y acción en el url
//c=controlador(controller)
//a=acción(action)

$c=$_GET['c'];
$a=$_GET['a'];

//establecer valores por defecto cuando no se pasen parámetros de controlador y acción
$controller=$c?$c:'default';
$action=$a?$a:'index';



//generar el url base y definirlo en la constante BASE para usar en cualquier parte del código
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$folder_route = dirname($_SERVER['PHP_SELF']);
$base = $protocol . "://" . $host . $folder_route;
define(BASE,$base);


//cargar librería controlador base
require_once('core/baseController.php');


//definir el controlador a cargar
$className=$controller.'Controller';

$controller_route='controllers/'.$className.'.php';

//incluir el controlador y llamar automáticamente a la acción establecida
if(file_exists($controller_route)){
    require_once($controller_route);

    $instance=new $className;

    $instance->$action();


    

}






?>