<?php
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ComponentsController.php';

class ProductDetailController extends ComponentsController implements Controller{
    private $_productID;

    function __construct($productID) {
        $this->_productID = $productID;
    }
    
    public function __render(){
        $productID = $this->_productID;
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'product' . DS . 'product_detail.php';
    }
}