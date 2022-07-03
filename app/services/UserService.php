<?php

require_once 'Service.php';
require_once '../models/User.php';

class UserService extends Service{

    // get username
    public function get($username){
        $query = "select * from user
                    where username='" . $username . "'";
        parent::setQuery($query);
        $result = parent::executeQuery();

        if($row = mysqli_fetch_array($result)){
            $username = $row["username"];
            $password = $row["password"];
            $name = $row["name"];
            $address = $row["address"];
            $telephone = $row["phoneNumber"];

            $user = new User($username, $password, $name, $address, $telephone);
            return $user;
        }

        return null;
    }

    // lay cart ID theo userID
    // param : username -> cart
    public function getCartID($userID){
        if(self::get($userID) == null){
            return -1;
        }

        $query = "select cart_id from cart
	               where userID = '" . $userID . "'";
        parent::setQuery($query);
        $result = parent::executeQuery();

        $row = mysqli_fetch_array($result);
        $cart_id = $row["cart_id"];

        return $cart_id;
    }

    // insert to cart
    // param user + product + number
    public function insertProduct($userID, $product, $number){
        $cart_id = self::getCartID($userID);
        $product_id = $product->getProductID();
        $query = "insert into cart_product(cart_id, product_id, number)
                    value($cart_id, $product_id, $number)
                  ";

        parent::setQuery($query);
        parent::updateQuery();
    }
}