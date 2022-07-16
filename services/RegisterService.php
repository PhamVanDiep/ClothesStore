<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';

class RegisterService extends Service{

    public function insert($user)
    {
        $query = "insert into user (`name`, `username`, `gmail`, `phoneNumber`, `gender`, `password`, `address`, `roleID`, `urlAvatar`, `googleId`)  values (" . 
                    "'" . $user->getName() . "', " . 
                    "'" . $user->getUsername() . "', " . 
                    "'" . $user->getEmail() . "', " . 
                    "'" . $user->getPhoneNumber() . "', " . 
                    "'" . $user->getGender() . "', " . 
                    "'" . $user->getPassword() . "', " . 
                    "'" . $user->getAddress() . "', " . 
                    "'" . $user->getRoleID() . "', " . 
                    "'" . $user->getUrlAvatar() . "', " . 
                    "'" . $user->getGoogleId() . "');";
        parent::setQuery($query);
        return parent::insertQuery();
    }

}