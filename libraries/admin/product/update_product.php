<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Product.php';
    $targetDir = "../../../public/res/img/products/";
    if (isset($_POST)) {
        $productID = $_POST['productID'];
        $name = $_POST['productName'];
        $categoryID = $_POST['category'];
        $price = $_POST['productPrice'];
        $oldPrice = $_POST['productAdvPrice'];
        $description = $_POST['productDescription'];

        $product = new Product($productID, $name, $categoryID, $price, $oldPrice, $description);

        $sizeRoot = $_POST['productSizes'];
        $typeRoot = $_POST['productStyles'];

        // product sizes process
        $sizes = explode(",", $sizeRoot);

        // product styles process
        $types = explode(",", $typeRoot);

        $product_service = new ProductService();
        $images_exist = $product_service->getAllImages($productID);

        $images_post = '';
        // images process
        $fileNames = array_filter($_FILES['files']['name']);
        $images_post = $_POST['event_images'];
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            if (in_array($fileName, $images_post)) {
                $check = $product_service->checkImageExist($productID, $fileName);
                if($check['num'] == 0) {
                    $targetFilePath = $targetDir . $fileName;
                    move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);
                    $product_service->updateImage($productID, $fileName);
                }
            }
        }

        foreach ($images_exist as $image) {
            if (!in_array($image['urlimage'], $images_post)) {
                unlink($targetDir.$image['urlimage']);
                $product_service->deleteImage($productID, $image['urlimage']);
            }
        }
        
        $product_service->updateProduct($product, $sizes, $types);

        header('Location: ../../../product-management');
    }