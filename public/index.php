<?php
$path_project = 'web/ClothesStore'; // may be change
session_start();
session_regenerate_id(true);

define('DS', '/');
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';
$url = $_SERVER['REQUEST_URI'];

// echo $url;
$route = new Router($path_project, $url);
$route->show();