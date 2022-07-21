<?php
require_once ROOT . DS . 'services' . DS . 'ProductService.php';
require_once ROOT . DS . 'services' . DS . 'UserService.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/css/root.css" />
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/body.css" />
    <link rel="stylesheet" href="public/css/product/product_detail.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <script src="public/js/product_detail.js"></script> -->
</head>

<body>

    <!-- header -->
    <?php
    require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
    ?>

    <!-- body -->
    <div class="body col-12">
        <div class="card-wrapper col-10">
            <div class="content-card col-10">
                <div class="box-card col-12">
                    <?php
                    $service = new ProductService();
                    $product = $service->getProduct($productID);
                    $images = $service->getAllImagesDetail($product->getProductID());
                    $size = $service->getSizeByID($product->getProductID());
                    $type = $service->getTypeByID($product->getProductID());

                    $userService = new UserService();
                    $userID = 0;
                    $cartID = 0;
                    if (isset($_SESSION['login_id'])) {
                        $userID = $_SESSION['login_id'];
                        $cartID = $userService->getCartID($userID);
                    }
                    ?>
                    <div class="card">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    <?php
                                    if (sizeof($images) >= 4)
                                    echo '
                                         <img src="public/res/img/products/' . $images[0] . '" >
                                         <img src="public/res/img/products/' . $images[1] . '" >
                                         <img src="public/res/img/products/' . $images[2] . '" >
                                         <img src="public/res/img/products/' . $images[3] . '" >';
                                    ?>
                                </div>
                            </div>
                            <div class="img-select">
                                <div class="img-item">
                                    <a data-id="1">
                                        <?php if (sizeof($images) >= 4) echo '<img src="public/res/img/products/' . $images[0] . '" > ' ?>
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a data-id="2">
                                        <?php if (sizeof($images) >= 4) echo '<img src="public/res/img/products/' . $images[1] . '" > ' ?>
                                </div>
                                <div class="img-item">
                                    <a data-id="3">
                                        <?php if (sizeof($images) >= 4) echo '<img src="public/res/img/products/' . $images[2] . '" > ' ?>
                                </div>
                                <div class="img-item">
                                    <a data-id="4">
                                        <?php if (sizeof($images) >= 4) echo '<img src="public/res/img/products/' . $images[3] . '" > ' ?>
                                </div>
                            </div>
                        </div>
                        <!-- card right -->
                        <div class="product-content">
                            <h2 class="product-title"><?php echo $product->getName() ?></h2>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>

                            </div>

                            <div class="product-price">
                                <p class="last-price">Old Price: <span><?php echo $product->getOldPrice() . " VNĐ" ?></span></p>
                                <p class="new-price">New Price: <span> <?php echo $product->getPrice() . " .VNĐ" ?></span></p>
                            </div>

                            <div class="product-detail">
                                <h2>Thông tin sản phẩm: </h2>
                                <p><?php echo $product->getDescription() ?></p>

                                <ul>
                                    <li> Màu sắc: <span  class="select" style="width: 300px;">
                                            <select id="type_select" required>
                                                <?php
                                                foreach ($type as $type) {
                                                    echo '
                                                        <option value="' . $type['name'] . '">' . $type['name'] . '</option>
                                                        ';
                                                }
                                                ?>
                                            </select>
                                        </span></li>
                                    <li> Size: <span class="select" style="width: 300px;">
                                            <select id="size_select" required>
                                                <?php
                                                foreach ($size as $size) {
                                                    echo '
                                                        <option value="' . $size['name'] . '">' . $size['name'] . '</option>
                                                        ';
                                                }
                                                ?>
                                            </select>
                                        </span></li>
                                    <li>Trạng thái: <span>Còn hàng</span></li>
                                    <li>Loại: <span>Quần áo</span></li>
                                </ul>
                            </div>
                            <div class="purchase-info">
                                <input id="number_product" type="number" min="0" value="1">
                                <button type="button" class="btn" onclick="addProduct(<?php echo $cartID . ', ' . $productID; ?>)">
                                    Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button type="button" class="btn">Mua Hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/product_detail.js"> </script>
</body>

</html>