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

    public function addCart($userID) {
        $query = "insert into cart (`userID`)  values ('" . $userID ."');";
        parent::setQuery($query);
        return parent::insertQuery();
    }
    

    //get cartID theo user
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
}