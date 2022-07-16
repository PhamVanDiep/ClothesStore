<?php
require_once '../../services/ProductService.php';
//require_once '../../services/UserService.php';
require_once '../../services/OrderService.php';
require_once 'C:\xampp\htdocs\web\ClothesStore\config\config.php';

// $pro = new ProductService();
// $result = $pro->search("Áo");
// $result = json_decode($result,true);
//$result = json_decode($result,true);

// $user = new UserService();
// $result = $user->getListCartProducts(3);
// var_dump($result);

$order = new OrderService();
$result = $order->getAllOrder();

var_dump($result);
?>