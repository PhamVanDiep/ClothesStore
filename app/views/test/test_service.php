<?php
require_once '../../services/ProductService.php';
require_once '../../services/UserService.php';
require_once '../../services/OrderService.php';
require_once 'C:\xampp\htdocs\web\ClothesStore\config\config.php';
require_once 'C:/xampp\htdocs/web/ClothesStore/app/models/Product.php';

// $pro = new ProductService();
// $result = $pro->search("Áo");
// $result = json_decode($result,true);
//$result = json_decode($result,true);

// $user = new UserService();
// $result = $user->getListCartProducts(2);
// while($row = mysqli_fetch_array($result)){
//     echo $row['userID'];
//     echo " /" ;
// }

$service = new UserService();
$listProducts = $service->getListCartProducts(7);
$sum = 0;
foreach ($listProducts as $product){
    //echo $product->getDescription();
	$sum += $product->getPrice();
}
echo $sum;

// $order = new OrderService();
// $result = $order->getAllOrder();
// while($row = mysqli_fetch_array($result)){
//     echo $row['userID'];
//     echo " /" ;
// }
?>