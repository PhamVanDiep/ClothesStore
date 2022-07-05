<?php
$path_project = 'ClothesStore'; // may be change

define('DS', '/');
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';
$url = $_SERVER['REQUEST_URI'];

// echo $url;
$route = new Router($path_project, $url);
$route->show();