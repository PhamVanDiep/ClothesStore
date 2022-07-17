<?php 
    require_once ROOT . DS . 'services' . DS . 'TurnoverService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';

    if(!isset($_SESSION['login_id'])){
        header('Location: /ClothesStore/logout');
        exit;
    }

    $id = $_SESSION['login_id'];
    $user_service = new UserService();
    $get_user = $user_service->getUserByID($id);

    if($get_user['roleID'] != 2) {
        header('Location: /ClothesStore/logout');
        exit;
    }

    $turnover_service = new TurnoverService();
    $week_revenue = $turnover_service->getTurnOverOfWeek();
    $week_revenue = $week_revenue['total_turnover_of_week'];
    $data_chart = $turnover_service->getTurnOverEachDayOfWeek();

    $month_revenue = $turnover_service->getTurnOverOfMonth();
    $month_revenue = $month_revenue['total_turnover_of_month'];
    $data_chart = $turnover_service->getTurnOverEachDayOfMonth();

    $xValue = array();
    $yValue = array();
    $month = date('m');
    $year = date('Y');

    for($d = 1; $d <= 31; $d++)
    {
        $time = mktime(12, 0, 0, $month, $d, $year);          
        if (date('m', $time) == $month) {
            $date_this = date('d-m', $time);
            array_push($xValue, $date_this);
            $had = false;
            foreach ($data_chart as $row) {
                if ($row['day'] == $date_this) {
                    array_push($yValue, $row['turnover']);
                    $had = true;
                    break;
                }
            }
            if(!$had) array_push($yValue, 0);
        }
    }

    function js_str($s)
    {
        return '"' . addcslashes($s, "\0..\37\"\\") . '"';
    }

    function js_array($array)
    {
        $temp = array_map('js_str', $array);
        return '[' . implode(',', $temp) . ']';
    }
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
        <script>
            window.onload = function () {
                let myChart = document.getElementById('myChart').getContext('2d');
                <?php echo 'var xValues = '. js_array($xValue). ';' ?>
                <?php echo 'var yValues = '. js_array($yValue). ';' ?>

                new Chart(myChart, {
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
            }
        </script>
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
                    <span class="general-quantity">100.000.000đ</span>
                    <span class="general-title">Doanh thu trong ngày</span>
                </div><div class="general-detail" id="general-order-wrap">
                    <span class="icon-wrap" id="order-icon-wrap">
                        <img src="public/res/img/admin/dashboard/grocery-cart.png">
                    </span>
                    <span class="general-quantity">500</span>
                    <span class="general-title">Đơn hàng trong ngày</span>
                </div><div class="general-detail" id="general-customer-wrap">
                    <span class="icon-wrap" id="customer-icon-wrap">
                        <img src="public/res/img/admin/dashboard/customer.png">
                    </span>
                    <span class="general-quantity">350</span>
                    <span class="general-title">Khách hàng</span>
                </div><div class="general-detail" id="general-product-wrap">
                    <span class="icon-wrap" id="product-icon-wrap">
                        <img src="public/res/img/admin/dashboard/products.png">
                    </span>
                    <span class="general-quantity">200</span>
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
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                    <td>Trạng thái</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro. Áo vải đẹp siêu cấp vip pro. Áo vải đẹp siêu cấp vip pro.</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td><span id="confirm-waiting" class="general-status">Chờ xác nhận</span></td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td><span id="shipping" class="general-status">Đang giao</span></td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td><span id="shipped" class="general-status">Đã giao</span></td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td><span id="canceled" class="general-status">Đã hủy</span></td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>

                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>#111111</td>
                                    <td>Áo vải đẹp siêu cấp vip pro</td>
                                    <td>3</td>
                                    <td>300.000đ</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="see-all-wrap">
                        <span>Chi tiết</span>
                    </div>
                </div>
                <div id="best-seller-wrap">
                    <div class="order-seller-sale-title order-seller-title" id="best-seller-header">
                        <div id="best-seller-title">Mua nhiều</div>
                        <div id="sell-filter" class="my-filter">
                            <select name="sell-filter" id="sell-filter">
                                <option value="month">Tháng</option>
                                <option value="week">Tuần</option>
                            </select>
                        </div>
                    </div>
                    <div id="best-seller-content">
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                        <div class="best-seller-wrap">
                            <div class="best-seller-image-wrap">
                                <img src="public/res/img/products/product1.jpg" alt="" srcset="">
                            </div>
                            <div class="best-seller-info">
                                <div class="best-seller-name">Áo thun nam</div>
                                <div class="best-seller-quantity">x1000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart-wrap">
                <div id="chart-header">
                    <div id="chart-title" class="order-seller-sale-title">Doanh thu</div>
                    <div id="total-sale">Tổng doanh thu: <?php echo number_format($month_revenue) . " vnđ"; ?></div>
                    <div id="chart-filter" class="my-filter">
                        <select name="chart-filter" id="chart-filter">
                            <option value="month">Tuần</option>
                            <option value="week">Tháng</option>
                        </select>
                    </div>
                </div>
                <div id="chart-content">          
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </body>
</html>