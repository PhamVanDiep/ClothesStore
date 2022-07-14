<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Product.php';

class ProductService extends Service{

    public function getAll() {
        $query = "select * from product";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

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

    public function insertProduct($product) {
        $query = "insert into product(name, categoryID, price, oldPrice, description) values ( "
                    . "'" . $product->getName() . "', "
                    . $product->getCategoryID() . ", "
                    . $product->getPrice() . ", "
                    . $product->getOldPrice() . ", "
                    . "'" . $product->getDescription() . "');";
        parent::setQuery($query);
        parent::insertQuery();
    }

    public function getLastID() {
        $query = "select productID from product order by productID DESC limit 1;";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function insertIntoSizeTable($productID, $sizes) {
        foreach ($sizes as $size) {
            $query = "insert into size(productID, name) values (" . $productID . ", '" . $size . "');";
            parent::setQuery($query);
            parent::insertQuery();
        }
    }

    public function insertIntoTypeTable($productID, $types) {
        foreach ($types as $type) {
            $query = "insert into type(productID, name) values (" . $productID . ", '" . $type . "');";
            parent::setQuery($query);
            parent::insertQuery();
        }
    }

    public function insertIntoImageTable($productID, $images)
    {
        foreach ($images as $image) {
            $query = "insert into product_image(productID, urlimage) values (" . $productID . ", '" . $image . "');";
            parent::setQuery($query);
            parent::insertQuery();
        }
    }

    public function getCategories()
    {
        $query = "select * from category;";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getCategoryByID($categoryID)
    {
        $query = "select * from category where categoryID = " . $categoryID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getSizeByID($productID)
    {
        $query = "select * from size where productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getTypeByID($productID)
    {
        $query = "select * from type where productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }
    
    public function update($product){
        
    }
}