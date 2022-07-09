<?php
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'services' . DS . 'ProductService.php';

$prod = new ProductService();
$result = $prod->search("pro");
$result = json_decode($result, true);
var_dump($result)
// for($row )
?>