<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'CartService.php';
    
    $cartService = new CartService();
    if (isset($_GET)) {
        $cartID = $_GET['cartID'];
        $productID = $_GET['productID'];
        $number = $_GET['number'];
        $size = $_GET['size'];
        $type = $_GET['type'];
        $cartService->insertProductToCart($cartID, $productID, $number, $size, $type);
        echo 'success';
    } else{
        echo 'not successfull';
    }
?>