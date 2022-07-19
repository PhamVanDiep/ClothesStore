<?php
require_once ROOT . DS . 'services' . DS . 'ProductService.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../public/css/root.css" />
    <link rel="stylesheet" href="../../../public/css/header.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/body.css" />
    <link rel="stylesheet" href="../../../public/css/product/product_detail.css     " />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- header -->
    <?php
    require '../components/header.php';
    ?>

    <!-- body -->
    <div class="body col-12">
        <div class="card-wrapper col-10">
            <div class="content-card col-10">
                <div class="box-card col-12">
                    <?php
                        $service = new ProductService();
                        $product = $service->getProduct(3);
                        $images = $service->getAllImages($product->getProductID());
                        $size = $service->getSizeByID($product->getProductID());
                        $type = $service->getTypeByID($product->getProductID());
                    ?>
                    <div class="card">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    <?php 
                                    
                                        echo '
                                            <img src="../../../public/res/img/products/' . $images[0] . '" >
                                            <img src="../../../public/res/img/products/' . $images[1] . '" >
                                            <img src="../../../public/res/img/products/' . $images[2] . '" >
                                            <img src="../../../public/res/img/products/' . $images[3] . '" >';
                                    
                                    ?>
                                </div>
                            </div>
                            <div class="img-select">
                                <div class="img-item">
                                    <a href="#" data-id="1">
                                        <?php echo '<img src="../../../public/res/img/products/' . $images[0] . '" > '?>
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="2">
                                    <?php echo '<img src="../../../public/res/img/products/' . $images[1] . '" > '?>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="3">
                                    <?php echo '<img src="../../../public/res/img/products/' . $images[2] . '" > '?>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="4">
                                    <?php echo '<img src="../../../public/res/img/products/' . $images[3] . '" > '?>
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
                                <p class="new-price">New Price: <span> <?php echo $product->getPrice() . " .VNĐ"?></span></p>
                            </div>

                            <div class="product-detail">
                                <h2>Thông tin sản phẩm: </h2>
                                <p><?php echo $product->getDescription() ?></p>
                               
                                <ul>
                                    <li> Màu sắc: <span class="select" style="width:400px;">
                                            <select>
                                                <option selected disabled>Chọn màu:</option>
                                                <?php 
                                                    foreach($type as $type){
                                                        echo '
                                                        <option value='.$type['name'].'>'.$type['name'].'</option>
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                        </span></li>
                                        <li> Size: <span class="select" style="width:400px;">
                                            <select>
                                                <option selected disabled>Chọn size:</option>
                                                <?php 
                                                    foreach($size as $size){
                                                        echo '
                                                        <option value='.$size['name'].'>'.$size['name'].'</option>
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
                                <input type="number" min="0" value="1">
                                <button type="button" class="btn">
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






    <!-- footer -->
    <?php
    require '../components/footer.php';
    ?>
</body>

</html>