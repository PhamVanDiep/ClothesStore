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
 ?>
 <!Doctype html>
<html>
    <head>
    <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/product.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Danh sách sản phẩm</title>
    </head>
    <body>
    <div class="col-10" id="head-bar">
            <?php 
                $title = "Sản phẩm";
                $subtitle = "Danh sách sản phẩm";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <table>
                    <thead> 
                        <tr>
                            <td>ID</td>
                            <td>Tên sản phẩm</td>
                            <td>Loại sản phẩm</td>
                            <td>Mô tả</td>
                            <td>Kích cỡ</td>
                            <td>Kiểu dáng</td>
                            <td>Giá quảng cáo</td>
                            <td>Giá bán</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $product_service = new ProductService();
                            $products = $product_service->getAll();
                            
                            foreach($products as $product) {
                                $productID = $product["productID"];

                                $category = $product_service->getCategoryByID($product['categoryID']);
                                $category = $category['name'];

                                $sizeRoot = $product_service->getSizeByID($productID);
                                $size_string = "";
                                foreach($sizeRoot as $size) {
                                    $size_string = $size['name'] . ", " . $size_string; 
                                }
                                $size_string = substr($size_string, 0, -2);

                                $typeRoot = $product_service->getTypeByID($productID);
                                $type_string = "";
                                foreach($typeRoot as $type) {
                                    $type_string = $type['name'] . ", " . $type_string;
                                }
                                $type_string = substr($type_string, 0, -2);

                                echo "<tr id='row_" .  $productID . "' >" 
                                        . "<td>#" . $productID . "</td>"
                                        . "<td>" . $product["name"] . "</td>"
                                        . "<td>" . $category . "</td>"
                                        . "<td>" . $product["description"] . "</td>"
                                        . "<td>" . $size_string . "</td>"
                                        . "<td>" . $type_string . "</td>"
                                        . "<td>" . number_format($product["oldPrice"]) . 'đ' . "</td>"
                                        . "<td>" . number_format($product["price"]) . 'đ' . "</td>"
                                        . "<td><a href='/$path_project/edit-product?productID=$productID'><img src='public/res/img/admin/edit.png' class='edit-button crud'></a></td>"
                                        . "<td><img src='public/res/img/admin/delete.png' class='delete-button crud' onclick=deleteEvent(" . $productID .") ></td>"
                                    . "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        function deleteEvent(productID) {
            let option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?');
            if(!option) return;
            let table = document.getElementsByTagName('table');
            let row = document.getElementById('row_' + productID);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    if (this.responseText == "success") {
                        alert("Xóa sản phẩm thành công!");
                        row.style.display = "none";
                    } else {
                        alert("Không thể xóa sản phẩm này!");
                    }
                }
            };
            xhttp.open("GET", "libraries/admin/product/delete_product.php?productID=" + productID, false);
            xhttp.send();
        }
    </script>
</html>