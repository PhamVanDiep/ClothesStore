<?php

// require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';

class Product {
    private $productID;        
    private $description;      
    private $name;
    private $categoryID;

    // public $type = Type::NONE;

    public function __construct($productID, $name, $categoryID, $description) {
        self::setProductID($productID);
        self::setName($name);
        self::setCategoryID($categoryID);
        self::setDescription($description);
    }

    public function getProductID()
    {
        return $this->productID;
    }
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;
    }

    public function getCategoryID()
    {
        return $this->categoryID;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}