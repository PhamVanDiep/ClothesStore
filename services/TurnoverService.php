<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';

class TurnoverService extends Service {
    public function getTurnOverOfMonth()
    {
        $query = "select sum(totalCost) as total_turnover_of_month "
                . "from `order` "
                . "where statusID != 1 "
                . "and statusID != 5 "
                . "and MONTH(timeCreate) = MONTH(CURRENT_DATE()) "
                . "and YEAR(timeCreate) = YEAR(CURRENT_DATE());";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getTurnOverOfWeek()
    {
        $query = "select sum(totalCost) as total_turnover_of_week "
                . "from `order` "
                . "where statusID != 1 "
                . "and statusID != 5 "
                . "and timeCreate >= DATE(NOW() - INTERVAL 7 DAY);";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getTurnOverEachDayOfWeek()
    {
        $query = "SELECT DATE_FORMAT(timeCreate,'%d-%m') as day, SUM(totalCost) as turnover 
            FROM `order`
            WHERE `statusID` != 1 and `statusID` != 5
            and timeCreate >= DATE(NOW() - INTERVAL 7 DAY)
            GROUP BY DATE_FORMAT(timeCreate, '%y-%m-%d')
            ORDER BY timeCreate ASC";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getTurnOverEachDayOfMonth()
    {
        $query = "SELECT DATE_FORMAT(timeCreate,'%d-%m') as day, SUM(totalCost) as turnover 
                    FROM `order` 
                    WHERE `statusID` != 1 
                    and `statusID` != 5 
                    and MONTH(timeCreate) = MONTH(CURRENT_DATE()) 
                    GROUP BY DATE_FORMAT(timeCreate, '%y-%m-%d') 
                    ORDER BY timeCreate ASC;";
        parent::setQuery($query);
        $data = parent::executeQuery();
        return $data;
    }

    public function getTurnOverOfDay()
    {
        $query = "select sum(o.totalCost) as res from `order` o, status st"
                    . " where st.statusID = o.statusID"
                    . " and st.name NOT IN ('Chờ xác nhận', 'Đã huỷ')"
                    . " and o.timeCreate = CURRENT_DATE()";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }
}