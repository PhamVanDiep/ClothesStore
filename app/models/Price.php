<?php

// require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';

class Price {
    private $priceID;
    private $productID;        
    private $type;
    private $price;
    private $number;
    private $oldPrice;
    private $newPrice;
    private $urlImage;

    // public $type = Type::NONE;

    public function __construct($priceID, $productID, $type, $price, $number, $oldPrice, $newPrice, $urlImage) {
        self::setProductID($productID);
        self::setPriceID($priceID);
        self::setType($type);
        self::setPrice($price);
        self::setNumber($number);
        self::setOldPrice($oldPrice);
        self::setNewPrice($newPrice);
        self::setUrlImage($urlImage);
    }

    public function setPriceID($priceID)
    {
        $this->priceID = $priceID;
    }

    public function getPriceID()
    {
        return $this->priceID;
    }

    public function getProductID()
    {
        return $this->productID;
    }
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $this->oldPrice;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    public function getNewPrice()
    {
        return $this->newPrice;
    }

    public function setNewPrice($newPrice)
    {
        return $this->newPrice;
    }

    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }

    public function getUrlImage()
    {
        return $this->urlImage;
    }
}
