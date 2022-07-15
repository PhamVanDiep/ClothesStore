<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';

class UserService extends Service {
    public function getNumberOfCustomers()
    {
        $query = "select count(*) as res from user where roleID = 1";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }
}