<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Product.php';
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';

    $targetDir = "../../../public/res/img/products/";
    if (isset($_POST)) {
        $name = $_POST['productName'];
        $categoryID = $_POST['category'];
        $price = $_POST['productPrice'];
        $oldPrice = $_POST['productAdvPrice'];
        $description = $_POST['productDescription'];

        $product = new Product(0, $name, $categoryID, $price, $oldPrice, $description);
        $product_service = new ProductService();
        $product_service->insertProduct($product);

        // get inserted product
        $productID = $product_service->getLastID();
        $productID = $productID['productID'];

        $sizeRoot = $_POST['productSizes'];
        $typeRoot = $_POST['productStyles'];

        // product sizes process
        $sizes = explode(",", $sizeRoot);
        $product_service->insertIntoSizeTable($productID, $sizes);

        // product styles process
        $types = explode(",", $typeRoot);
        $product_service->insertIntoTypeTable($productID, $types);

        // images process
        $fileNames = array_filter($_FILES['files']['name']);
        $images_post = $_POST['event_images'];
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            if (in_array($fileName, $images_post)) {
                $targetFilePath = $targetDir . $fileName; 
                move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);
            }
        }
        $product_service->insertIntoImageTable($productID, $images_post);

        header('Location: ../../../product-management');
    }