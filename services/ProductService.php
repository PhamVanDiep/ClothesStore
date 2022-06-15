<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';

class ProductService extends Service{

    public function search($product_name){
        $query = "select * from product where product.name like '%" . $product_name . "%'";
        // $query = "select * from product";
        parent::setQuery($query);  
        $result = parent::executeQuery();
        return json_encode($result);
        // echo mysqli_num_rows($result);
    }
}