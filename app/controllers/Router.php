<?php

require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'HomepageController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'CartController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'DashboardController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'TestController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'EventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AddEventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'EditEventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ProductController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AddProductController.php';

class Router {
    private $_dispath;
    private $_url;
    private $_path_project;
    private $_isAdmin;

    function __construct($_path_project, $_url) {
        $this->_path_project = $_path_project;
        $this->_url = $_url;
        $this->_isAdmin = false;
        self::parsingURL();
    }

    function parsingURL() {
        if(strcmp($this->_url,"/" . $this->_path_project . "/") == 0){
            $this->_dispath = new HomepageController();
            $this->_isAdmin = false;
            return;
        }
        if(strcmp($this->_url,"/" . $this->_path_project . "/cart") == 0){
            $this->_dispath = new CartController();
            $this->_isAdmin = false;
            return;
        }
        if(strcmp($this->_url,"/" . $this->_path_project . "/dashboard") == 0){
            $this->_dispath = new DashboardController();
            $this->_isAdmin = true;
            return;
        }
        // test service
        if(strcmp($this->_url,"/" . $this->_path_project . "/test") == 0){
            $this->_dispath = new TestController();
            $this->_isAdmin = false;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/event-management") == 0){
            $this->_dispath = new EventController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/add-event") == 0){
            $this->_dispath = new AddEventController();
            $this->_isAdmin = true;
            return;
        }

        if(str_contains($this->_url, 'edit-event')) {
            $eventID = strrpos($this->_url, '=');
            $eventID = substr($this->_url, $eventID + 1);
            $this->_dispath = new EditEventController($eventID);
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/product-management") == 0){
            $this->_dispath = new ProductController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/add-product") == 0){
            $this->_dispath = new AddProductController();
            $this->_isAdmin = true;
            return;
        }
    }

    function show() {
        // if($this->_isAdmin){
        //     $this->_dispath->__admin_header();
        //     $this->_dispath->__admin_leftbar();
        // }
        $this->_dispath->__render();
        if(!$this->_isAdmin)
            $this->_dispath->__footer();
    }
}
