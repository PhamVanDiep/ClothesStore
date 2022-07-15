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
}