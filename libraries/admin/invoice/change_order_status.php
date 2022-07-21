<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'OrderService.php';

    if (isset($_GET)) {
        $orderID = $_GET['orderID'];
        $statusID = $_GET['statusID'];

        $order_service = new OrderService();
        $order_service->updateOrderStatus($orderID, $statusID);
        echo 'success';
    }