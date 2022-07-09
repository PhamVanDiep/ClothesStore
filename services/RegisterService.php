<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';

class RegisterService extends Service{

    public function insert($user)
    {
        $query = "insert into user (`name`, `username`, `gmail`, `phoneNumber`, `gender`, `password`, `address`, `roleID`, `urlAvatar`)  values (" . 
                    "'" . $user->getName() . "', " . 
                    "'" . $user->getUsername() . "', " . 
                    "'" . $user->getEmail() . "', " . 
                    "'" . $user->getPhoneNumber() . "', " . 
                    "'" . $user->getGender() . "', " . 
                    "'" . $user->getPassword() . "', " . 
                    "'" . $user->getAddress() . "', " . 
                    "'" . $user->getRoleID() . "', " . 
                    "'" . $user->getUrlAvatar() . "');";
        parent::setQuery($query);
        parent::insertQuery();
    }

}