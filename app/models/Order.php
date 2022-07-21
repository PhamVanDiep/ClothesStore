<?php

class Order {
    private $userID;
    private $orderID;
    private $timeCreate;
    private $totalCost;
    private $statusID;
    private $delivery;
    
    public function __construct($userID, $orderID, $timeCreate, $totalCost, $statusID, $delivery) {
        self::setUserID($userID);
        self::setOrderID($orderID);
        self::setTimeCreate($timeCreate);
        self::setTotalCost($totalCost);
        self::setStatusID($statusID);
        self::setDelivery($delivery);
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    public function getTimeCreate()
    {
        return $this->timeCreate;
    }

    public function setTimeCreate($timeCreate)
    {
        $this->timeCreate = $timeCreate;
    }

    public function getStatusID()
    {
        return $this->statusID;
    }

    public function setStatusID($statusID)
    {
        $this->statusID = $statusID;
    }

    public function getTotalCost()
    {
        return $this->totalCost;
    }

    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }
}
