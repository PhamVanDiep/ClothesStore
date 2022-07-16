<?php
require_once 'Service.php';

class OrderService extends Service{
    

    // lay tat ca don hang
    public function getAllOrder()
    {
        $query = "select o.* from `order` o";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }


    // lay tat ca don hang theo status 
    // Param StatusID
    public function getOrder($statusId)
    {
        $query = "select o.* from `order` o 
        where o.statusID = '$statusId' ";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return json_encode($result);
    }


    // lay doanh thu theo thang
    // param : Month
    public function getTotalCostByMonth($month){
        $query = "SELECT sum(o.totalCost) from `order` o 
        where MONTH(o.timeCreate) = '$month'";
        parent::setQuery($query);
        $result = parent::executeQuery();
    } 
    
    

}