<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/root.css" />
        <link rel="stylesheet" href="public/css/header.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
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
            <div class="order-header-wrap col-12">
                <div class="main-order-header-wrap col-10">
                    <div class="order-status" id="order-status-0" onclick="filterByStatus(0)">
                        Tất cả
                    </div><div class="order-status" id="order-status-1" onclick="filterByStatus(1)">
                        Chờ xác nhận
                    </div><div class="order-status" id="order-status-2" onclick="filterByStatus(2)">
                        Đã xác nhận
                    </div><div class="order-status" id="order-status-3" onclick="filterByStatus(3)">
                        Đang giao
                    </div><div class="order-status" id="order-status-4" onclick="filterByStatus(4)">
                        Đã giao
                    </div><div class="order-status" id="order-status-5" onclick="filterByStatus(5)">
                        Đã hủy
                    </div>
                </div>
            </div>
        </div>
        <div id="search-wrap" class="col-10">
            <div id="order-input-wrap" class="col-12">
                <span id="search-icon"><img src="public/res/img/orders/search.png" alt="" srcset=""></span>
                <input id="search-order-status" type="text" placeholder="Nhập tên sản phẩm" onkeyup="filterByName(this)"/>
            </div>
        </div>
        <?php
            require_once ROOT . DS . 'services' . DS . 'OrderService.php';
            $order_service = new OrderService();
            $userID = 1;
            $all_orders = $order_service->getAllOrdersOfUser($userID); // must reconfig
            // print_r($all_orders);
            foreach ($all_orders as $order) {
                $orderID = $order['orderID'];
                $totalCost = $order['totalCost'];
                $statusID = $order['statusID'];
                $statusName = $order['name'];
                $allProductsOfOrder = $order_service->getAllProductsOfOrder($orderID);
                
                $num = 0;
                foreach ($allProductsOfOrder as $product) {
                    $num++;
                }
                if ($num == 0) {
                    continue;
                }

                echo '<div class="order-detail-wrap col-10 order-detail-wrap-' . $statusID . '" style="display:block;">
                        <div class="order-detail-status">
                            <img src="public/res/img/orders/shipped.png" alt="" srcset="">
                            <b id="status-text-' . $orderID . '" class="';
                if ($statusID == 1) {
                    echo 'confirm-waiting';
                } elseif ($statusID == 2) {
                    echo 'confirmed';
                } elseif ($statusID == 3) {
                    echo 'shipping';
                } elseif ($statusID == 4) {
                    echo 'shipped';
                } elseif ($statusID == 5) {
                    echo 'canceled';
                }
                echo '">' . $statusName . '</b>
                        </div>';

                foreach ($allProductsOfOrder as $product) {
                    echo '<div class="order-detail-product">
                            <div class="product-image">
                                <img src="public/res/img/products/'. $product['urlimage'] .'" alt="" srcset="">
                            </div><div class="product-info">
                                <div class="info-detail product-title">'. $product['name'] .'</div>
                                <div class="info-detail product-category">Phân loại hàng : '. $product['size'] . ', ' . $product['type'] .'</div>
                                <div class="info-detail product-quantity">x'. $product['number'] . '</div>
                            </div><div class="total-price">
                                <span>'. number_format($product['price']) .'đ</span>
                            </div>
                        </div>';
                }

                echo '<div class="order-detail-bottom">
                            <div class="total-pay">
                                <b>Tổng số tiền: </b>
                                <span><b>'. number_format($totalCost) .'đ</b></span>
                            </div>';
                if ($statusID == 4 || $statusID == 5) {
                    echo '<div class="order-button order-success">
                            <button class="success-btn" onclick="reBuy('. $orderID . ',' . $userID . ')">Mua lại</button>
                        </div>';
                } else if ($statusID == 1 || $statusID == 2) {
                    echo '<div class="order-button order-cancel" id="order-cancel-' . $orderID .'">
                            <button class="cancel-btn" onclick="cancelOrder(' . $orderID . ',' . $userID . ')">Hủy đơn hàng</button>
                        </div>
                        <div class="order-button order-success" id="order-success-' . $orderID . '" style="display:none;">
                            <button class="success-btn" onclick="reBuy('. $orderID . ',' . $userID . ')">Mua lại</button>
                        </div>';
                }
                            
                echo '</div>
                </div>';
            }
        ?>
        <script src="public/js/order.js"></script> 
    </body>
</html>