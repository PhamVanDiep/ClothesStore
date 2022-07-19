<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';

class UserService extends Service{

    public function getNumberOfCustomers()
    {
        $query = "select count(*) as res from user where roleID = 1";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getUserByID($id)
    {
        $query = "select * from user where userID = '" . $id . "';";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getUserByEmail($email)
    {
        $query = "select * from user where gmail = '" . $email . "';";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getUserByGoogleID($googleId)
    {
        $query = "select * from user where googleId = '" . $googleId . "';";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getUserAvatar($userID)
    {
        $query = "select urlAvatar from `user` where userID = " . $userID;
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    // huan add services homepage

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