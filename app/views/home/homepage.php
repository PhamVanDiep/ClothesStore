<!DOCTYPE html>
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
        <?php
        require_once 'slider.php';
        ?>
        <div class="content col-10">
            <!-- thanh san pham goi y  -->
            <div class="suggest-bar col-12">
                <p> SẢN PHẨM GỢI Ý</p>
            </div>

            <!-- product suggest-->
            <div class="product-suggest col-12">
                <center>
                    <?php
                        require_once ROOT . DS . 'services' . DS . 'ProductService.php';
                        $service = new ProductService();
                        $listProduct = $service->viewProductHomepage();

                        $cnt = 0;
                        foreach ($listProduct as $product) {
                            $product_name = $product['name'];
                            if (strlen($product_name) > 40) {
                                $product_name = substr($product_name, 0, 40);
                                // $product_name = preg_replace('/\W\w+\s*(\W*)$/', '$1', $product_name);
                                $product_name = explode(" ", $product_name);
                                array_splice($product_name, -1);
                                $product_name = implode(" ", $product_name);
                                $product_name = $product_name . ' ...';
                            }
                            echo '<div class="product-detail" onclick="location.href=\'/web/ClothesStore/products?productID='. $product['productID'] . '\'">'
                                    . '<div class="product-image col-12">'
                                        .'<img src="public/res/img/products/' . $service->getImageHomepage($product['productID']) . '" />'
                                    . '</div>'
                                    . '<div class="product-info col-12">'
                                        . '<div class="product-name col-12">' . $product_name . '</div>'
                                        . '<div class="product-price col-12">' . number_format($product['price']) . ' ₫</div>'
                                        . '<div class="product-old-price col-12">' . number_format($product['oldPrice']) . ' ₫</div>'
                                    . '</div>'
                                . '</div>';
                            $cnt++;
                            if ($cnt == 20) {
                                break;
                            }
                        }
                    ?>
                </center>
            </div>
        </div>
    </div>
</body>

</html>