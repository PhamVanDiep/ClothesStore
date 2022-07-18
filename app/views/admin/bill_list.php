<!Doctype html>
<html>

<head>
    <link rel="stylesheet" href="../../../public/css/admin_root.css" />
    <link rel="stylesheet" href="../../../public/css/admin_leftbar.css" />
    <link rel="stylesheet" href="../../../public/css/admin_header.css" />
    <link rel="stylesheet" href="../../../public/css/admin/dashboard.css" />
    <link rel="stylesheet" href="../../../public/css/admin/bill_list.css" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    
</head>

<body>
    <div class="col-10" id="head-bar">
        <?php
        $title = "Danh sách đơn hàng";
        $subtitle = "";
        require '../components/admin_header.php';
        ?>
    </div>
    <?php
    require '../components/admin_leftbar.php';
    ?>
    <div class="col-10" id="content">
     
        <table>
            <thead>
                <tr>
                    <td class="col1">ID</td>
                    <td class="col2">Ngày tạo</td>
                    <td class="col3">Khách hàng</td>
                    <td class="col4">Sản phẩm</td>
                    <td class="col5">Tổng tiền</td>
                    <td class="col6">Trạng thái</td>
                    <td class="col7">Mã vận đơn</td>
                </tr>
            </thead>
            <tbody >
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="btn-confirm"> Xác nhận </div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="delivering">
                            Đang giao
                        </div>
                    
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="confirmed"> Đã xác nhận</div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="confirmed"> Đã xác nhận</div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="confirmed"> Đã xác nhận</div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="confirmed"> Đã xác nhận</div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="btn-confirm"> Xác nhận </div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6">
                        <div class="cancelled"> Đã hủy</div>
                    </td>
                    <td class="col7"></td>
                </tr>
                <tr>
                    <td class="col1">#001</td>
                    <td class="col2">2022-05-27 23:45 </td>
                    <td class="col3">huan_dn123</td>
                    <td class="col4">
                        <div> 1x Áo sơ mi nam.....</div>
                        <div> 2x Quần vải ống.... </div>
                    </td>
                    <td class="col5">đ460.000</td>
                    <td class="col6" id="test">
                        <div class="completed"> Hoàn thành </div>
                        
                    </td>
                    <td class="col7"></td>
                </tr>
            </tbody>
        </table>

    </div>
   
</body>
    <script src="../../../public/js/bill_list.js"></script> 
</html>
