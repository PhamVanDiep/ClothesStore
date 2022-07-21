<?php
require_once 'Service.php';
require_once 'C:/xampp/htdocs/web/ClothesStore/app/models/Product.php';

class CartService extends Service{
    // public function get($userID){
    //     $query = "select * from user
    //                 where userID='" . $userID . "'";
    //     parent::setQuery($query);
    //     $result = parent::executeQuery();

    //     if($row = mysqli_fetch_array($result)){
    //         $username = $row["username"];
    //         $password = $row["password"];
    //         $name = $row["name"];
    //         $address = $row["address"];
    //         $telephone = $row["phoneNumber"];

    //         $user = new User($username, $password, $name, $address, $telephone);
    //         return $user;
    //     }

    //     return null;
    // }

    // lay cart ID theo userID
    // param : username -> cart
    public function getCartID($userID){
        // if(self::get($userID) == null){
        //     return -1;
        // }

        $query = "select cartID from cart
	               where userID = '" . $userID . "'";
        parent::setQuery($query);
        $result = parent::executeQuery();

        $row = mysqli_fetch_array($result);
        $cartID = $row["cartID"];

        return $cartID;
    }

    /**
     * Method get all products of guest
     * @param int $userID
     * @param Product $product
     * @param String $type
     * @param String $size
     * @return array
     */
    public function insertProductToCart($cartID, $productID, $number, $size, $type){
        $query = "insert into cart_product(cartID, productID, number,size, type)
                    value(" . $cartID . ', ' . $productID . ', ' . $number . ", '" . $size . "', '". $type . "')";
        parent::setQuery($query);
        parent::insertQuery();

    }


    /**
     * Method get all products of guest
     * @param int $username
     * @return array
     */
    public function getListCartProducts($userID){
        $listCartProducts = array();

        $cartID = self::getCartID($userID);
        $query = "select * from cart_product
                    where cartID =" . $cartID;

        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
        // while($row = mysqli_fetch_array($result)){
        //     $size = $row['size'];
        //     $type = $row['type'];
        //     $productID = $row["productID"];
        //     $service = new ProductService();
        //     $product = $service->getProduct($productID);
        //     array_push($listCartProducts,$product);

        // }
        // return $listCartProducts;
    }


}