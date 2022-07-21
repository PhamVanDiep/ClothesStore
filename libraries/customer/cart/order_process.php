<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'CartService.php';
    require_once ROOT . DS . 'services' . DS . 'OrderService.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Order.php';
    $cartService = new CartService();
    $order_service = new OrderService();

    if (isset($_POST)) {
        $data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode($data);
        $userID = $data->userID;
        $totalCost = $data->totalCost;
        $delivery = $data->delivery;
        $timeCreate = date('y-m-d');

        $order = new Order($userID, 0, $timeCreate, $totalCost, 1, $delivery);
        $order_service->insertOrder($order);

        $orderID = $order_service->getLastOrderID();
        $orderID = $orderID['orderID'];

        // $number_of_product = sizeof($data->products);
        $products = $data->products;
        foreach ($products as $product) {
            $productID = $product->productID;
            $number = $product->number;
            $type = $product->type;
            $size = $product->size;
            $order_service->insertOrderDetail($productID, $orderID, $number, $type, $size);
        }

        echo 'success';
    }
?>