<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/root.css" />
        <link rel="stylesheet" href="public/css/header.css" />
        <link rel="stylesheet" href="public/css/footer.css" />
        <link rel="stylesheet" href="public/css/body.css" />
        <link rel="stylesheet" href="public/css/orders/order_header.css" />
        <link rel="stylesheet" href="public/css/orders/order_search.css" />
        <link rel="stylesheet" href="public/css/orders/order_detail.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
        ?>
        <div class="body col-12" id="body">
            <?php 
                require_once 'order_header.php';
            ?>
        </div>
        <div id="search-wrap" class="col-10">
            <div id="order-input-wrap" class="col-12">
                <span id="search-icon"><img src="public/res/img/orders/search.png" alt="" srcset=""></span>
                <input id="search-order-status" type="text" placeholder="Nhập tên sản phẩm" />
            </div>
        </div>
        <?php
            require_once ROOT . DS . 'services' . DS . 'OrderService.php';
            $order_service = new OrderService();
            $all_orders = $order_service->getAllOrdersOfUser(1); // must reconfig
            // print_r($all_orders);
            foreach ($all_orders as $order) {
                
            }
        ?>
        <script src="public/js/order.js"></script> 
    </body>
</html>