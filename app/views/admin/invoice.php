<?php 
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    global $path_project;
    require_once ROOT . DS . 'services' . DS . 'UserService.php';

    if(!isset($_SESSION['login_id'])){
        header('Location: /web/ClothesStore/logout');
        exit;
    }

    $id = $_SESSION['login_id'];
    $user_service = new UserService();
    $get_user = $user_service->getUserByID($id);

    if($get_user['roleID'] != 2) {
        header('Location: /web/ClothesStore/logout');
        exit;
    }

    function getSelectorByStatusID($statusID, $orderID)
    {
        if ($statusID == 1) {
            echo '<select class="confirm-waiting status-selector" onchange="changeOrderStatus(this, ' . $orderID . ')">'
                    . '<option selected disabled hidden>Chờ xác nhận</option>'
                    . '<option value="2">Xác nhận</option>'
                    . '<option value="5">Hủy đơn hàng</option>'
                .'</select>';
        } else if ($statusID == 2) {
            echo '<select class="confirmed status-selector" onchange="changeOrderStatus(this, ' . $orderID . ')">'
                    . '<option selected disabled hidden>Đã xác nhận</option>'
                    . '<option value="3">Đang giao hàng</option>'
                    . '<option value="5">Hủy đơn hàng</option>'
                .'</select>';
        } else if ($statusID == 3) {
            echo '<select class="shipping status-selector" onchange="changeOrderStatus(this, ' . $orderID . ')">'
                    . '<option selected disabled hidden>Đang giao hàng</option>'
                    . '<option value="4" class="shipped">Đã giao hàng</option>'
                .'</select>';
        } else if ($statusID == 4) {
            echo '<select class="shipped status-selector"><option selected disabled hidden>Đã giao hàng</option></select>';
        } else if ($statusID == 5) {
            echo '<select class="canceled status-selector"><option selected disabled hidden>Đã hủy</option></select>';
        }
    }
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/dashboard.css" />
        <link rel="stylesheet" href="public/css/admin/bill_list.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Danh sách đơn hàng</title>
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php 
                $title = "Đơn hàng";
                $subtitle = "Danh sách đơn hàng";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div class="col-10" id="content">
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Ngày tạo</td>
                        <td>Tên khách hàng</td>
                        <td>Số điện thoại</td>
                        <td>Địa chỉ</td>
                        <td>Sản phẩm</td>
                        <td>Tổng tiền</td>
                        <td>Trạng thái</td>
                        <td>Mã vận đơn</td>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        require_once ROOT . DS . 'services' . DS . 'OrderService.php';

                        $order_service = new OrderService();

                        $invoices = $order_service->getAllOrders();
                        foreach ($invoices as $invoice) {
                            $orderID = $invoice['orderID'];
                            $userID = $invoice['userID'];
                            $timeCreate = $invoice['timeCreate'];
                            $totalCost = $invoice['totalCost'];
                            $statusID = $invoice['statusID'];
                            $delivery = $invoice['delivery'];

                            $allProductsOfOrder = $order_service->getAllProductsOfOrder($orderID);
                            $num = 0;
                            foreach ($allProductsOfOrder as $product) {
                                $num++;
                            }
                            if ($num == 0) {
                                continue;
                            }
                            $order_user = $user_service->getUserByID($userID);
                            echo '<tr>'
                                    . '<td>#' . $orderID . '</td>'
                                    . '<td>' . $timeCreate . '</td>'
                                    . '<td>' . $order_user['name'] . '</td>'
                                    . '<td>' . $order_user['phoneNumber'] . '</td>'
                                    . '<td>' . $order_user['address'] . '</td>'
                                    . '<td>';
                            foreach ($allProductsOfOrder as $product) {
                                echo 'x'. $product['number'] . '; ' . $product['name'] . '; ' . 'Phân loại hàng : '. $product['size'] . ', ' . $product['type'] . '<br>';
                            }

                            echo '</td>'
                                . '<td>' . number_format($totalCost) . 'đ</td>'
                                . '<td>';
                            getSelectorByStatusID($statusID, $orderID);
                            echo '</td>';
                            echo '<td>' . $delivery . '</td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    <!-- <script src="public/js/bill_list.js"></script> -->
    <script>
        function changeOrderStatus(selector, orderID) {
            if (selector.value == 5) {
                let option = confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
                if(!option) return;
            }
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    if (this.responseText.toLowerCase() == "success") {
                        alert('Cập nhật trạng thái đơn hàng thành công!');
                        (selector.classList).forEach(element => {
                            if (element != "status-selector") {
                                selector.classList.remove(element);
                            }
                        });
                        
                        if(selector.value == 2) {
                            selector.classList.add('confirmed');
                            selector.innerHTML = '<option selected disabled hidden>Đã xác nhận</option>'
                                                + '<option value="3">Đang giao hàng</option>'
                                                + '<option value="5">Hủy đơn hàng</option>';
                        } if(selector.value == 3) {
                            selector.classList.add('shipping');
                            selector.innerHTML = '<option selected disabled hidden>Đang giao hàng</option>'
                                                + '<option value="4" class="shipped">Đã giao hàng</option>';
                        } if(selector.value == 4) {
                            selector.classList.add('shipped');
                            selector.innerHTML = '<option selected disabled hidden>Đã giao hàng</option>';
                        } if(selector.value == 5) {
                            selector.classList.add('canceled');
                            selector.innerHTML = '<option selected disabled hidden>Đã hủy</option>';
                        }
                    }
                }
            }
            xmlhttp.open("GET", "libraries/admin/invoice/change_order_status.php?orderID=" + orderID + "&statusID=" + selector.value, true);
            xmlhttp.send();
        }
    </script>
</html>