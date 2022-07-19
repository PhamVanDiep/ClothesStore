<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'OrderService.php';
    $order_service = new OrderService();
    if (isset($_GET['cancel'])) {
        $orderID = $_GET['cancel'];
        $order_service->cancelOrder($orderID);
        echo 'success';
    } else if (isset($_GET['rebuy'])) {
        $orderID = $_GET['rebuy'];
        $userID = $_GET['userID'];
        $order_service->reBuy($orderID, $userID);
        echo 'success';
    }
?>