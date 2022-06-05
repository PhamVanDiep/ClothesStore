<?php
$path_project = 'web/ClothesStore'; // may be change

define('DS', '/');
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);

require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

$route = new Router();
$route->show();