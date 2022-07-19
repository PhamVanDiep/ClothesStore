<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../../../public/css/admin_root.css" />
        <link rel="stylesheet" href="../../../public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="../../../public/css/admin_header.css" />
        <link rel="stylesheet" href="../../../public/css/admin/dashboard.css" />
        <link rel="stylesheet" href="../../../public/css/admin/admin_bill.css" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    </head>
    <body>
    <div class="col-10" id="head-bar">
            <?php
                require '../components/admin_header.php';
            ?>
        </div>
        <?php 
            require '../components/admin_leftbar.php';
        ?>
         <div class="col-10" id="content">
            
            <div id="content-title">
                Đơn hàng
            </div>
            <div id = "bill-filter" >
                <a class = "bill-status-classify">
                    <span>Tất cả</span>
                </a>
                <a class = "bill-status-classify">
                    <span>Chờ xác nhận</span>
                </a>
                <a class = "bill-status-classify">
                    <span>Đang giao</span>
                </a>
                <a class = "bill-status-classify">
                    <span>Đã hoàn thành</span>
                </a>
                <a class = "bill-status-classify">
                    <span>Đã hủy</span>
                </a>
            </div>
            <div id = "bill-list">
                <div class = "bill-info">
                    
                    <div class="bill-header">
                        <a class= "bill-id"> ID: #000001 </a>
                        <a class="status"> Giao hàng thành công </a>
                    </div>
                    <div class ="bill-detail">
                        <div class="item-list">
                            <div class="item-info">
                                <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                                <div class ="item-detail">
                                    <a class = "item-name">Áo sơ mi nữ ngắn tay </a>
                                    <div class = "item-variation">
                                        <a>Màu trắng, XL</a>
                                        <div>₫100.000</div>
                                    </div>
                                    <div class = "item-quantity">
                                        <a>x1</a>
                                        <div>₫100.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                                <div class ="item-detail">
                                    <a class = "item-name">Áo sơ mi nữ ngắn tay </a>
                                    <div class = "item-variation">
                                        <a>Màu trắng, XL</a>
                                        <div>₫100.000</div>
                                    </div>
                                    <div class = "item-quantity">
                                        <a>x1</a>
                                        <div>₫100.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="cost-info">
                                <div class = "items-cost">
                                    <a> Tổng tiền </a>
                                    <a> ₫200.000 </a>
                                </div>
                                <div class = "delivery-cost">
                                    <a> Vận chuyển </a>
                                    <a> ₫20.000 </a>
                                </div>
                                <div class = "voucher-discount">
                                    <a> Voucher </a>
                                    <a> -₫20.000 </a>
                                </div>
                                <div class = "order-total">
                                    <a> Thanh toán  </a>
                                    <a> ₫200.000 </a>
                                </div>
                                <div class="payment-option">
                                        <a> Phương thức thanh toán: </a>
                                        <a> Thanh toán khi nhận hàng </a>
                                </div>

                            </div>
                        </div>
                                     
                        <div class="customer-info">
                            <div class = "account-info">
                                <img class="user-avt" src = "../../../public/res/img/admin/avatar.jpeg"/>
                                <a class="username">huan_0139</a>
                            </div>
                            <div class="account-detail" >    
                            <a class="customer-name">Đinh Ngọc Huân</a>
                            <a style="color:#68d69d">|</a>
                            <a class="customer-tel">023404992490</a>
                            </div>
                            <div class="delivery-info">
                                <div class="receiver-info">
                                    <img src="../../../public\res\img\admin\delivery.png"/>
                                    <div>
                                        <a class= "receiver-name"> Đinh Ngọc Huân </a>
                                        <a class="receiver-tel"> (84)1241245845</a>
                                        <a class="delivery-address"> Số 13 13 Phố Tân Mai Tân Mai, Hoàng Mai, Hà Nội </a>
                                    </div>
                                </div>
                                <div class="tracking-info">
                                    <div>Đơn vị vận chuyển: THDD Express</div>
                                    <div>Mã vận đơn : spx5456896323463 </div>
                                </div>
                            </div>
                            
                        </div>
                       
                   

                </div>
                <div class="second-row">
                    <div class = "first-column">
                        
                        <div class= "bill-timeline">
                            <div class = "create-time">
                                <a>Thời gian tạo</a>
                                <a>2020/06/23 14:33:43</a>
                            </div>
                            <div class = "confirm-time">
                                <a>Thời gian xác nhận</a>
                                <a>2020/06/23 14:33:43</a>
                            </div>
                            <div class = "ship-out-time">
                                <a>Giao cho nhà vận chuyển</a>
                                <a>2020/06/23 14:33:43</a>
                            </div>
                            <div class = "received-time">
                                <a>Giao hàng thành công</a>
                                <a>2020/06/23 14:33:43</a>
                            </div>
                            <div class = "completed-time">
                                <a>Hoàn thànn</a>
                                <a>2020/06/23 14:33:43</a>
                            </div>
                        </div>
                    </div>
                    <div class = "second-column">
                        <button class="edit-btn">
                            Chỉnh sửa
                        </button>
                        <button class = "del-btn">
                            Xóa
                        </button>
                    </div>

                </div>
            </div>


        </div>
   
    </body>