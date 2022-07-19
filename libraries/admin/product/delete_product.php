<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';

    $targetDir = "../../../public/res/img/products/";
    if (isset($_GET)) {
        $productID = $_GET['productID'];
        $product_service = new ProductService();

        $canDelete = $product_service->checkCanDelete($productID);
        if ($canDelete == false) {
            echo "fail";
        } else {
            $images = $product_service->getAllImages($productID);
            foreach ($images as $image) {
                if(file_exists($targetDir . $image['urlimage']))
                    unlink($targetDir . $image['urlimage']);
            }
            $product_service->deleteProduct($productID);
            echo "success";
        }
    }