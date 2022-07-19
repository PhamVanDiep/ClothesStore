<<<<<<< HEAD
<?php
require_once 'C:/xampp/htdocs/web/ClothesStore/app/services/ProductService.php';

?>
<!Doctype html>
<html>

<head>
    <link rel="stylesheet" href="../../../public/css/root.css" />
    <link rel="stylesheet" href="../../../public/css/header.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/body.css" />
    <link rel="stylesheet" href="../../../public/css/homepage/homepage.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    require '../components/header.php';
    ?>

    <div class="body col-12">
        <div class="content col-10">
            <div class="slide col-12">
                <!-- slide  -->
                <div class="image-1 col-8">
                    <img src="../../../public/res/img/events/event1.png" alt="slide san pham">
                </div>
                <div class="image-2 col-4">
                    <div class="image-2-1 col-12">
                        <img src="../../../public/res/img/events/event2.png" alt="slide san pham">
                    </div>
                    <div class="image-2-2 col-12">
                        <img src="../../../public/res/img/events/envent3.png" alt="slide san pham">
                    </div>
                </div>
            </div>

            <!-- thanh san pham goi y  -->
            <div class="suggest-bar col-12">
                <p> SẢN PHẨM GỢI Ý</p>
            </div>

            <!-- product suggest-->
            <div class="product-suggest col-12">

                <?php
                $service = new ProductService();
                $listProduct = $service->viewProductHomepage();
                
                $cnt = 0;
                foreach ($listProduct as $product) {
                    $cnt++;
                ?>
                    <div class="product-suggest-item col-2">
                        <div class="item-image col-12">
                            <?php
                            //echo  $images;
                            $service = new ProductService();
                            $images = $service->getImageHomepage($product->getProductID());
                            $urlimage = "public/res/img/products/" . $images . "";
                            echo '
                            <img src="../../../public/res/img/products/' . $images . '" >'

                            // 
                            ?>

                        </div>
                        <div class="item-name">
                            <p> <?php echo $product->getName() ?></p>
                        </div>
                        <div class="item-description">
                            <div class="item-cost">
                                <p><?php echo $product->getPrice() . " VNĐ" ?></p>
                            </div>
                            <div class="item-selled">
                                <p>Đã bán 10</p>
                            </div>
                        </div>
                    </div>
                <?php
                    if ($cnt > 15) break;
                }
                ?>




                <!-- pagination  -->
                <div class="container">
                    <div class="pagination p1">
                        <ul>
                            <a href="#">
                                <li>
                                    <</li>
                            </a>
                            <a class="is-active" href="#">
                                <li>1</li>
                            </a>
                            <a href="#">
                                <li>2</li>
                            </a>
                            <a href="#">
                                <li>3</li>
                            </a>
                            <a href="#">
                                <li>4</li>
                            </a>
                            <a href="#">
                                <li>5</li>
                            </a>
                            <a href="#">
                                <li>6</li>
                            </a>
                            <a href="#">
                                <li>></li>
                            </a>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
=======
<!Doctype html>
<html>

<head>
    <link rel="stylesheet" href="public/css/root.css" />
    <link rel="stylesheet" href="public/css/header.css" />
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/body.css" />
    <link rel="stylesheet" href="public/css/homepage/homepage.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
    ?>

<div class="body col-12">
        <div class="content col-10">
            <div class="slide col-12">
                <!-- slide  -->
                <div class="image-1 col-8">
                    <img src="../../../public/res/img/events/event1.png" alt="slide san pham">
                </div>
                <div class="image-2 col-4">
                    <div class="image-2-1 col-12">
                        <img src="../../../public/res/img/events/event2.png" alt="slide san pham">
                    </div>
                    <div class="image-2-2 col-12">
                        <img src="../../../public/res/img/events/envent3.png" alt="slide san pham">
                    </div>
                </div>
            </div>

            <!-- thanh san pham goi y  -->
            <div class="suggest-bar col-12">
                <p> SẢN PHẨM GỢI Ý</p>
            </div>

            <!-- product suggest-->
            <div class="product-suggest col-12">

                <?php
                $service = new ProductService();
                $listProduct = $service->viewProductHomepage();
                
                $cnt = 0;
                foreach ($listProduct as $product) {
                    $cnt++;
                ?>
                    <div class="product-suggest-item col-2">
                        <div class="item-image col-12">
                            <?php
                            //echo  $images;
                            $service = new ProductService();
                            $images = $service->getImageHomepage($product->getProductID());
                            $urlimage = "public/res/img/products/" . $images . "";
                            echo '
                            <img src="../../../public/res/img/products/' . $images . '" >'

                            // 
                            ?>

                        </div>
                        <div class="item-name">
                            <p> <?php echo $product->getName() ?></p>
                        </div>
                        <div class="item-description">
                            <div class="item-cost">
                                <p><?php echo $product->getPrice() . " VNĐ" ?></p>
                            </div>
                            <div class="item-selled">
                                <p>Đã bán 10</p>
                            </div>
                        </div>
                    </div>
                <?php
                    if ($cnt > 15) break;
                }
                ?>




                <!-- pagination  -->
                <div class="container">
                    <div class="pagination p1">
                        <ul>
                            <a href="#">
                                <li>
                                    <</li>
                            </a>
                            <a class="is-active" href="#">
                                <li>1</li>
                            </a>
                            <a href="#">
                                <li>2</li>
                            </a>
                            <a href="#">
                                <li>3</li>
                            </a>
                            <a href="#">
                                <li>4</li>
                            </a>
                            <a href="#">
                                <li>5</li>
                            </a>
                            <a href="#">
                                <li>6</li>
                            </a>
                            <a href="#">
                                <li>></li>
                            </a>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
>>>>>>> master
