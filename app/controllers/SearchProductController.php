<?php
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ComponentsController.php';

class SearchProductController extends ComponentsController implements Controller{
    private $_productSearchName;

    function __construct($productSearchName) {
        $this->_productSearchName = $productSearchName;
    }
    
    public function __render(){
        $productSearchName = $this->_productSearchName;
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'home' . DS . 'search_product.php';
    }
}