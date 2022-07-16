<?php

class Cart {
    private $userID;      // int
    private $listProduct;  // array
    private $date;          // date
    
    public function __construct($userID, $listProducts) {
        self::setUserID($userID);
        self::setListProduct($listProducts);
        self::setDate(date("Y-m-d"));
    }
    
    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getListProduct()
    {
        return $this->listProduct;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @param mixed $listProduct
     */
    public function setListProduct($listProduct)
    {
        $this->listProduct = $listProduct;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    
}
