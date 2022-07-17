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
        $query = "SELECT o.orderID , o.totalCost, o.statusID, s.name  
                    FROM `order` o, status s 
                    WHERE o.statusID = s.statusID;";
        // them dk AND o.userID = $userID
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getAllProductsOfOrder($orderID)
    {
        $query = "SELECT od.number, od.size, od.type, pi.urlimage,  
                            p.productID, p.name, p.price 
                    FROM product p, order_detail od, product_image pi  
                    WHERE od.orderID = " . $orderID . 
                       " AND od.productID = p.productID
                        AND pi.urlimage = (SELECT urlimage FROM product_image WHERE productID = p.productID LIMIT 1);";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function cancelOrder($orderID)
    {
        $query = "UPDATE `order` SET statusID = 5 WHERE orderID = " . $orderID;
        parent::setQuery($query);
        parent::updateQuery();
    }

    public function reBuy($orderID, $userID)
    {
        $query = "INSERT INTO cart(userID) values(" . $userID . ");";
        parent::setQuery($query);
        parent::insertQuery();
        
        $query = "SELECT cartID FROM cart ORDER BY cartID DESC LIMIT 1";
        parent::setQuery($query);
        $result = parent::executeQuery($query);
        $result = mysqli_fetch_assoc($result);
        $cartID = $result['cartID'];

        $query = "SELECT * FROM order_detail WHERE orderID = " . $orderID;
        parent::setQuery($query);
        $order_details = parent::executeQuery();

        foreach ($order_details as $order_detail) {
            $productID = $order_detail['productID'];
            $number = $order_detail['number'];
            $size = $order_detail['size'];
            $type = $order_detail['type'];

            $query = "INSERT INTO cart_product values (" 
                        . $cartID . ", " . $productID . ", " . $number . ", '" . $size  . "', '" . $type . "');";
            parent::setQuery($query);
            parent::insertQuery($query);
        }
    }
}