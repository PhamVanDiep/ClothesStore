<?php

class Router {
    private $_dispath;

    function __construct() {
        self::parsingURL();
    }

    function parsingURL() {
        require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'HomepageController.php';
        $this->_dispath = new HomepageController();
    }

    function show() {
        $this->_dispath->__render();
        $this->_dispath->__footer();
    }
}
