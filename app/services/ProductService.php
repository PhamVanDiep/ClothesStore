<?php

require_once 'Service.php';

class ProductService extends Service{

    // create search product with name
    public function search($product_name)
    {
        $query = "select * from product where product.name like '%" .$product_name. "%'";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return json_encode($result);
    }

    
    
}