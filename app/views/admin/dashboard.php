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
                var xValues = [50,60,70,80,90,100,110,120,130,140,150];
                var yValues = [7,8,8,9,9,9,10,11,14,14,15];

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
                    <div id="total-sale">Tổng doanh thu: 100.000.000đ</div>
                    <div id="chart-filter" class="my-filter">
                        <select name="chart-filter" id="chart-filter">
                            <option value="month">Tháng</option>
                            <option value="week">Tuần</option>
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