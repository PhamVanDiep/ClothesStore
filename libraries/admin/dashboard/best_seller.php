<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    $product_service = new ProductService();

    if ($_GET['type'] == "month") {
        $result = $product_service->getTop10ProductOfMonth();
        $result_array = array();
        foreach ($result as $row) {
            array_push($result_array, $row);
        }
        echo json_encode($result_array);
    } else if ($_GET['type'] == "week") {
        $result = $product_service->getTop10ProductOfWeek();
        $result_array = array();
        foreach ($result as $row) {
            array_push($result_array, $row);
        }
        echo json_encode($result_array);
    }