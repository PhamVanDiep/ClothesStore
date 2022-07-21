<?php

require_once 'Service.php';
require_once 'C:/xampp/htdocs/web/ClothesStore/app/models/Product.php';

class ProductService extends Service{

    // create search product with name
    public function search($product_name)
    {
        $query = "select * from product where product.name like '%" .$product_name. "%'";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return json_encode($result);
    }

    //xem thong tin san pham
    public function viewProductDetail($product_id){
        $query = "select * from product where productID = '$product_id' ";
        parent::setQuery($query);
        $result = parent::executeQuery();
    }

    public function getOnce($productID)
    {
        $query = "select * from product where productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getProduct($productID)
    {
        $query = "select * from product where productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        if($row = mysqli_fetch_assoc($result)){
            $product_id = $row["productID"];
            $description = $row["description"];
            $name = $row["name"];
            $categoryID = $row["categoryID"];
            $price = $row["price"];
            $oldPrice = $row["oldPrice"];
            $product = new Product($product_id,$name,$categoryID,$price, $oldPrice, $description);
            return $product;
        }
        return null;
    }

    public function viewProductHomepage(){
        $listProduct = array();
        $query = "select * from product LIMIT 20";
        parent::setQuery($query);
        $result = parent::executeQuery();
        while($row = mysqli_fetch_array($result)){
            $product_id = $row["productID"];
            $description = $row["description"];
            $name = $row["name"];
            $categoryID = $row["categoryID"];
            $price = $row["price"];
            $oldPrice = $row["oldPrice"];
            $product = new Product($product_id,$name,$categoryID,$price, $oldPrice, $description);
            array_push($listProduct, $product);
        }

        return $listProduct;
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


    public function getAllImages($productID) {
        $query = "select urlimage from product_image where productID = " . $productID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        $listImageUrl = array();
        while($row = mysqli_fetch_array($result)){
            $url = $row['urlimage'];
            array_push($listImageUrl, $url);
        }
        return $listImageUrl;
    }

    public function getImageHomepage($productID) {
        $query = "select urlimage from product_image where productID = " . $productID . " LIMIT 1;";
        parent::setQuery($query);
        $result = parent::executeQuery();
        if($row = mysqli_fetch_array($result)){
            $urlimage = $row['urlimage'];
            return $urlimage;
        }
        return "product1.jpg";
        
    }

    
    
}