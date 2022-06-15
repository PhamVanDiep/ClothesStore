<?php

require_once ROOT . DS . 'services' . DS . 'ProductService.php';
$prod = new ProductService();
$prod->search("pro");

?>