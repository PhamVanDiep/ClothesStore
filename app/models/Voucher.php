<?php

class Voucher{
    private $voucherID;
    private $name;
    private $discountPercent;
    private $eventID;
    private $maxDiscount;
    private $minOrderPrice;
    private $timeStart;
    private $timeEnd;

    public function __construct($voucherID, $name, $discountPercent, $eventID, $maxDiscount, $minOrderPrice, $timeStart, $timeEnd){
        self::setVoucherID($voucherID);
        self::setName($name);
        self::setDiscountPercent($discountPercent);
        self::setEventID($eventID);
        self::setMaxDiscount($maxDiscount);
        self::setMinOrderPrice($minOrderPrice);
        self::setTimeStart($timeStart);
        self::setTimeEnd($timeEnd);
    }

    public function getVoucherID()
    {
        return $this->voucherID;
    }

    public function setVoucherID($voucherID)
    {
        $this->voucherID = $voucherID;
    }

    public function getEventID()
    {
        return $this->eventID;
    }

    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
    }

    public function getMaxDiscount()
    {
        return $this->maxDiscount;
    }

    public function setMaxDiscount($maxDiscount)
    {
        $this->maxDiscount = $maxDiscount;
    }

    public function getMinOrderPrice()
    {
        return $this->minOrderPrice;
    }

    public function setMinOrderPrice($minOrderPrice)
    {
        $this->minOrderPrice = $minOrderPrice;
    }

    public function getTimeStart()
    {
        return $this->timeStart;
    }

    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
    }
}