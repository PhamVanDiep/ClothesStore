<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'CartService.php';
    
    $cartService = new CartService();
    if (isset($_GET)) {
        $cartID = $_GET['cartID'];
        $productID =$_GET['productID'];
        $cartService->deleteProduct($cartID,$productID);
        echo 'success';
    } else{
        echo 'not successfull';
    }
?>