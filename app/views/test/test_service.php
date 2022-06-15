<?php
require_once '../../services/ProductService.php';
require_once 'C:\xampp\htdocs\web\ClothesStore\config\config.php';

$pro = new ProductService();
$result = $pro->search("pro");
$result = json_decode($result,true);
var_dump($result);

?>