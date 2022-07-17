<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';

class EditInfoService extends Service{

    public function update($user){
        $query = "update user
                    set " . 
                    "name = " . "'" . $user->getName() . "', " . 
                    "username = " . "'" . $user->getUsername() . "', " . 
                    "phoneNumber = " . "'" . $user->getPhoneNumber() . "', " . 
                    "address = " . "'" . $user->getAddress() . "', " . 
                    "gmail = " . "'" . $user->getEmail() . "', " . 
                    "gender = " . "'" . $user->getGender() . "' " . 
                    "where userID = " . $user->getUserID();
        echo $query;
        parent::setQuery($query);
        parent::updateQuery();
    }
}