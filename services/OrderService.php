<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';

class OrderService extends Service {
    public function getNumberOfOrderADay()
    {
        $query = "select count(*) as res from `order` where timeCreate = CURRENT_DATE();";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getOrdersOfCurrentDay()
    {
        $query = "select o.*, p.name, od.number, s.name as status_name "
                    . " FROM `order` o, order_detail od, product p, status s " 
                    . " WHERE o.timeCreate = CURRENT_DATE()"
                    . " and o.orderID = od.orderID"
                    . " and od.productID = p.productID"
                    . " and o.statusID = s.statusID";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getAllOrdersOfUser($userID)
    {
        $query = "SELECT o.orderID , o.totalCost, o.statusID, 
                            od.number, od.size, od.type, 
                            p.name as product_name 
                    FROM `order` o, product p, order_detail od 
                    WHERE userID = 1
                        AND	o.userID = userID
                        AND o.orderID = od.orderID
                        AND od.productID = p.productID";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }
}