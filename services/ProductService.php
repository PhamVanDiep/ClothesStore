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

    public function getOnce($productID)
    {
        $query = "select * from product where productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
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
    
    public function getAllImages($productID) {
        $query = "select urlimage from product_image where productID = " . $productID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function updateProduct($product, $sizes, $types){
        $productID = $product->getProductID();
        $query = "update product set "
                . "name = '" . $product->getName() . "', "
                . "categoryID = " . $product->getCategoryID() . ", "
                . "price = " . $product->getPrice() . ", "
                . "oldPrice = " . $product->getOldPrice() . ", "
                . "description = '" . $product->getDescription() . "' "
                . "where productID = " . $productID . ";";
        parent::setQuery($query);
        parent::updateQuery();
        self::updateSizes($productID, $sizes);
        self::updateTypes($productID, $types);
    }

    public function updateSizes($productID, $sizes)
    {
        $query = "delete from size where productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();
        self::insertIntoSizeTable($productID, $sizes);
    }

    public function updateTypes($productID, $types)
    {
        $query = "delete from type where productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();
        self::insertIntoTypeTable($productID, $types);
    }

    public function deleteImage($productID, $urlImage) {
        $query = "delete from product_image where productID = " . $productID . " and urlimage = '" . $urlImage . "';";
        parent::setQuery($query);
        parent::deleteQuery();
    }

    public function updateImage($productID, $urlImage) {
        $query = "insert into product_image values (" . $productID . ", '" . $urlImage . "');";
        parent::setQuery($query);
        parent::insertQuery();
    }

    public function checkImageExist($productID, $urlImage)
    {
        $query = "select count(*) as num from product_image where productID = " . $productID . " and urlimage = '" . $urlImage . "';";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getNumberOfProducts()
    {
        $query = "select count(*) as res from product;";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getTop10ProductOfWeek()
    {
        $query = "select x.name, temp.so_luong, pi.urlimage from product x, 
        (select od.productID as productID, od.orderID as orderID, SUM(od.number) as so_luong from order_detail od 
        INNER join `order` o on o.orderID = od.orderID 
        where o.timeCreate >= CURRENT_DATE - 6 
        GROUP by productID 
        order BY so_luong DESC 
        LIMIT 10) as temp, product_image pi 
        where x.productID = temp.productID 
        AND pi.urlimage = (SELECT pi.urlimage FROM product_image pi WHERE pi.productID = x.productID LIMIT 1);";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getTop10ProductOfMonth()
    {
        $query = "select x.name, temp.so_luong, pi.urlimage from product x, 
        (select od.productID as productID, od.orderID as orderID, SUM(od.number) as so_luong from order_detail od 
        INNER join `order` o on o.orderID = od.orderID 
        where MONTH(o.timeCreate) = MONTH(CURRENT_DATE) 
        GROUP by productID 
        order BY so_luong DESC 
        LIMIT 10) as temp, product_image pi 
        where x.productID = temp.productID 
        AND pi.urlimage = (SELECT pi.urlimage FROM product_image pi WHERE pi.productID = x.productID LIMIT 1);";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function checkCanDelete($productID)
    {
        $query = "SELECT COUNT(*) AS num FROM order_detail WHERE productID = " . $productID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        $result = mysqli_fetch_assoc($result);
        if ($result['num'] != 0) {
            return false;
        } else {
            $query = "SELECT COUNT(*) AS num FROM cart_product WHERE productID = " . $productID;
            parent::setQuery($query);
            $result = parent::executeQuery();
            $result = mysqli_fetch_assoc($result);
            if ($result['num'] != 0) {
                return false;
            }
        }
        return true;
    }

    public function deleteProduct($productID)
    {
        $query = "DELETE FROM size WHERE productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();

        $query = "DELETE FROM `type` WHERE productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();

        $query = "DELETE FROM product_image WHERE productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();

        $query = "DELETE FROM product WHERE productID = " . $productID;
        parent::setQuery($query);
        parent::deleteQuery();
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
        $query = "select * from product LIMIT 20";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
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
    
    public function getFourImages($productID) {
        $query = "select urlimage from product_image where productID = " . $productID . " LIMIT 4;";
        parent::setQuery($query);
        $result = parent::executeQuery();
        $listImageUrl = array();
        while($row = mysqli_fetch_array($result)){
            $url = $row['urlimage'];
            array_push($listImageUrl, $url);
        }
        return $listImageUrl;
    }
}