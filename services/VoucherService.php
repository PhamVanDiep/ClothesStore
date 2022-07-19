<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Voucher.php';

class VoucherService extends Service{

    public function getAll()
    {
        // $query = "select event.*, eventimage.* 
        //             from event, eventimage 
        //             where event.eventID = eventimage.eventID;";
        $query = "select * from voucher";
        parent::setQuery($query);
        $result = parent::executeQuery();
        // return json_encode($result);
        return $result;
    }

    public function getOnce($voucherID)
    {
        $query = "select * from voucher
                    where voucherID = " . $voucherID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function update($voucher){
        $query = "update voucher
                    set " . 
                    "name = " . "'" . $voucher->getName() . "', " . 
                    "discountPercent = " . "'" . $voucher->getDiscountPercent() . "', " . 
                    "eventID = " . "'" . $voucher->getEventID() . "', " . 
                    "maxDiscount = " . "'" . $voucher->getMaxDiscount() . "', " . 
                    "minOrderPrice = " . "'" . $voucher->getMinOrderPrice() . "', " . 
                    "timeStart = " . "'" . $voucher->getTimeStart() . "', " . 
                    "timeEnd = " . "'" . $voucher->getTimeEnd() . "' " . 
                    "where voucherID = " . $voucher->getVoucherID();
        parent::setQuery($query);
        parent::updateQuery();
    }

    public function insert($voucher)
    {
        $query = "insert into voucher (`name`, `discountPercent`, `eventID`, `maxDiscount`, `minOrderPrice`, `timeStart`, `timeEnd`)  values (" . 
                    "'" . $voucher->getName() . "', " . 
                    "'" . $voucher->getDiscountPercent() . "', " .
                    "'" . $voucher->getEventID() . "', " .
                    "'" . $voucher->getMaxDiscount() . "', " .
                    "'" . $voucher->getMinOrderPrice() . "', " .   
                    "'" . $voucher->getTimeStart() . "', " . 
                    "'" . $voucher->getTimeEnd() . "');";
        parent::setQuery($query);
        parent::insertQuery();

        
    }

    public function delete($voucherID) {

        $query = "delete from voucher where voucherID = " . $voucherID . ";";
        parent::setQuery($query);
        parent::deleteQuery();
    }

}