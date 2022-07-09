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

    public function getProductById($id){
        $query = "select product.*, price.* from product, price where product.id = " . $id. "and product.productID = ";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return json_encode($result);
    }

    public function update($product){
        
    }
}