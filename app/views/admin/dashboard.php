<?php 
    require_once ROOT . DS . 'services' . DS . 'TurnoverService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';

    global $path_project;

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

    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    require_once ROOT . DS . 'services' . DS . 'OrderService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';

    $turnover_service = new TurnoverService();

    // Revenue in current day.
    $current_day_revenue = $turnover_service->getTurnOverOfDay();
    $current_day_revenue = $current_day_revenue['res'];
    $current_day_revenue = number_format($current_day_revenue);

    // number of orders in current day.
    $order_service = new OrderService();
    $current_day_orders = $order_service->getNumberOfOrderADay();
    $current_day_orders = $current_day_orders['res'];
    $current_day_orders = number_format($current_day_orders);

    // number of customers
    $user_service = new UserService();
    $number_of_customers = $user_service->getNumberOfCustomers();
    $number_of_customers = $number_of_customers['res'];
    $number_of_customers = number_format($number_of_customers);

    // number of products
    $product_service = new ProductService();
    $number_of_products = $product_service->getNumberOfProducts();
    $number_of_products = $number_of_products['res'];
    $number_of_products = number_format($number_of_products);
    
    // get orders of current day.
    $orders_of_current_day = $order_service->getOrdersOfCurrentDay();

    $week_revenue = 0;

?>

<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/dashboard.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Dashboard</title>
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php 
                $title = "Tổng quan";
                $subtitle = "";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div class="col-10" id="content">
            <div id="dashboard-general" class="col-10">
                <div class="general-detail" id="general-sale-wrap">
                    <span class="icon-wrap" id="sale-icon-wrap">
                        <img src="public/res/img/admin/dashboard/sale.png" >
                    </span>
                    <span class="general-quantity"><?php echo $current_day_revenue; ?>đ</span>
                    <span class="general-title">Doanh thu trong ngày</span>
                </div><div class="general-detail" id="general-order-wrap">
                    <span class="icon-wrap" id="order-icon-wrap">
                        <img src="public/res/img/admin/dashboard/grocery-cart.png">
                    </span>
                    <span class="general-quantity"><?php echo $current_day_orders; ?></span>
                    <span class="general-title">Đơn hàng trong ngày</span>
                </div><div class="general-detail" id="general-customer-wrap">
                    <span class="icon-wrap" id="customer-icon-wrap">
                        <img src="public/res/img/admin/dashboard/customer.png">
                    </span>
                    <span class="general-quantity"><?php echo $number_of_customers; ?></span>
                    <span class="general-title">Khách hàng</span>
                </div><div class="general-detail" id="general-product-wrap">
                    <span class="icon-wrap" id="product-icon-wrap">
                        <img src="public/res/img/admin/dashboard/products.png">
                    </span>
                    <span class="general-quantity"><?php echo $number_of_products; ?></span>
                    <span class="general-title">Sản phẩm</span>
                </div>
            </div>
            <div id="today-order-best-seller">
                <div id="today-order-wrap">
                    <div class="order-seller-sale-title order-seller-title">Đơn hàng trong ngày</div>
                    <div id="today-order-table-wrap">
                        <table>
                            <thead> 
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td>Sản phẩm</td>
                                    <td>Thành tiền</td>
                                    <td>Trạng thái</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $pre_orderID = 0;
                                    $product_concat = '';
                                    $price = 0;
                                    $status = '';
                                    $status_class = '';
                                    foreach ($orders_of_current_day as $res) {
                                        if ($pre_orderID > 0) {
                                            if ($res['orderID'] === $pre_orderID) {
                                                $product_concat = $product_concat . ", " . $res['name'] . " (x" . $res['number'] . ") ";
                                            } else {
                                                echo "<tr>"
                                                        . "<td>#" . $pre_orderID . "</td>"
                                                        . "<td>" . $product_concat . "</td>"
                                                        . "<td>" . number_format($price) .  "đ</td>"
                                                        . "<td><span class='general-status " . $status_class . "'>" . $status . "</span></td>"
                                                    . "</tr>";
                                                $pre_orderID = $res['orderID'];
                                                $product_concat = $res['name'] . " (x" . $res['number'] . ") ";
                                                $price = $res['totalCost'];
                                                $status = $res['status_name'];
                                                if ($status === "Chờ xác nhận") {
                                                    $status_class = "confirm-waiting";
                                                } else if ($status === "Đã xác nhận") {
                                                    $status_class = "confirmed";
                                                } else if ($status === "Đang giao hàng") {
                                                    $status_class = "shipping";
                                                } else if ($status === "Đã giao hàng") {
                                                    $status_class = "shipped";
                                                } else {
                                                    $status_class = "canceled";
                                                }
                                            }
                                        } else {
                                            $pre_orderID = $res['orderID'];
                                            $product_concat = $res['name'] . " (x" . $res['number'] . ") ";
                                            $price = $res['totalCost'];
                                            $status = $res['status_name'];
                                            if ($status === "Chờ xác nhận") {
                                                $status_class = "confirm-waiting";
                                            } else if ($status === "Đã xác nhận") {
                                                $status_class = "confirmed";
                                            } else if ($status === "Đang giao hàng") {
                                                $status_class = "shipping";
                                            } else if ($status === "Đã giao hàng") {
                                                $status_class = "shipped";
                                            } else {
                                                $status_class = "canceled";
                                            }
                                        }
                                    }
                                    echo "<tr>"
                                            . "<td>#" . $pre_orderID . "</td>"
                                            . "<td>" . $product_concat . "</td>"
                                            . "<td>" . number_format($price) .  "đ</td>"
                                            . "<td><span class='general-status " . $status_class . "'>" . $status . "</span></td>"
                                        . "</tr>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="see-all-wrap">
                        <span><a href= <?php echo "/" . $path_project . "/invoice-management"; ?>>Chi tiết</a></span>
                    </div>
                </div>
                <div id="best-seller-wrap">
                    <div class="order-seller-sale-title order-seller-title" id="best-seller-header">
                        <div id="best-seller-title">Mua nhiều</div>
                        <div id="sell-filter" class="my-filter">
                            <select name="sell-filter" id="sell-filter" onchange="changeBestSeller(this)">
                                <option value="week">Tuần</option>
                                <option value="month">Tháng</option>
                            </select>
                        </div>
                    </div>
                    <div id="best-seller-content">
                        <div class="best-seller-wrap" id="best-seller-wrap-0">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-0">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-0"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-0"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-1">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-1">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-1"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-1"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-2">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-2">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-2"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-2"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-3">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-3">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-3"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-3"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-4">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-4">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-4"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-4"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-5">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-5">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-5"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-5"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-6">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-6">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-6"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-6"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-7">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-7">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-7"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-7"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-8">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-8">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-8"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-8"></div>
                            </div>
                        </div>
                        <div class="best-seller-wrap" id="best-seller-wrap-9">
                            <div class="best-seller-image-wrap">
                                <img src="" alt="" srcset="" id="best-seller-img-9">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name" id="best-seller-name-9"></div>
                                <div class="best-seller-quantity" id="best-seller-quantity-9"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart-wrap">
                <div id="chart-header">
                    <div id="chart-title" class="order-seller-sale-title">Doanh thu</div>
                    <div id="total-sale"></div>
                    <div id="chart-filter" class="my-filter">
                        <select name="chart-filter" id="chart-filter" onchange="changeChart(this)">
                            <option value="week">Tuần</option>
                            <option value="month">Tháng</option>
                        </select>
                    </div>
                </div>
                <div id="chart-content">          
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <script>
            changeBestSellerView("week");

            let myChart = document.getElementById('myChart').getContext('2d');
            let xValues = [];
            let yValues = [];
            let selectedChartType = 'week';

            let chartObject = new Chart(myChart, {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                            label: "Doanh thu (nghìn vnđ)",
                            data: yValues,
                            backgroundColor: "#FFFFFF",
                            borderColor: "blue"
                        }]
                    }
                });
            changeChartView('week');

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function changeChartView(type) {
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        let responseArray = JSON.parse(this.responseText);
                        xValues = responseArray[2];
                        yValues = responseArray[1];
                        document.getElementById("total-sale").innerHTML = "Tổng doanh thu: " + numberWithCommas(responseArray[0]) + " vnđ";
                        chartObject.data.labels = JSON.parse(xValues);
                        chartObject.data.datasets.forEach((dataset) => {
                            dataset.data = JSON.parse(yValues);;
                        });
                        chartObject.update();
                    }
                }
                xmlhttp.open("GET", "libraries/admin/dashboard/revenue.php?type=" + type, true);
                xmlhttp.send();
            }

            function changeChart(selector) {
                changeChartView(selector.value);
            }

            function changeBestSellerView(type) {
                let num = 0;
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        let data = JSON.parse(this.responseText);
                        data.forEach(element => {
                            document.getElementById("best-seller-img-" + num).setAttribute("src","public/res/img/products/" + element["urlimage"]);
                            document.getElementById("best-seller-name-" + num).innerHTML = element["name"];
                            document.getElementById("best-seller-quantity-" + num).innerHTML = "x" + element["so_luong"];
                            document.getElementById("best-seller-wrap-" + num).style.display = "block";
                            num++;
                        });
                    }
                }
                xmlhttp.open("GET", "libraries/admin/dashboard/best_seller.php?type=" + type, true);
                xmlhttp.send();
            }

            function changeBestSeller(selector) {
                for (let index = 0; index < 10; index++) {
                    document.getElementById("best-seller-wrap-" + index).style.display = "none";
                }
                changeBestSellerView(selector.value);
            }
        </script>
    </body>
</html>