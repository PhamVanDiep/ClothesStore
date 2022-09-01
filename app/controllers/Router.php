<?php

require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'HomepageController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'CartController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'DashboardController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'EventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AddEventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'EditEventController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ProductController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AddProductController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'EditProductController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'OrderController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AddVoucherController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ManageVoucherController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'UpdateVoucherController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'LoginController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'RegisterController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'InfoController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'HomeTestController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'LogoutController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'AdminInfoController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'InvoiceManagementController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ProductDetailController.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'SearchProductController.php';

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
            $this->_isAdmin = true;
            return;
        }
        if(strcmp($this->_url,"/" . $this->_path_project . "/dashboard") == 0){
            $this->_dispath = new DashboardController();
            $this->_isAdmin = true;
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
        // Login
        if(strcmp($this->_url,"/" . $this->_path_project . "/login") == 0){
            $this->_dispath = new LoginController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/product-management") == 0){
            $this->_dispath = new ProductController();
            $this->_isAdmin = true;
            return;
        }

        //hometest
        if(strcmp($this->_url,"/" . $this->_path_project . "/home-test") == 0){
            $this->_dispath = new HomeTestController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/add-product") == 0){
            $this->_dispath = new AddProductController();
            $this->_isAdmin = true;
            return;
        }

        if(str_contains($this->_url, 'edit-product')) {
            $productID = strrpos($this->_url, '=');
            $productID = substr($this->_url, $productID + 1);
            $this->_dispath = new EditProductController($productID);
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/logout") == 0){
            $this->_dispath = new LogoutController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/orders") == 0){
            $this->_dispath = new OrderController();
            $this->_isAdmin = false;
            return;
        }
        // Register
        if(strcmp($this->_url,"/" . $this->_path_project . "/register") == 0){
            $this->_dispath = new RegisterController();
            $this->_isAdmin = true;
            return;
        }

        // Info
        if(strcmp($this->_url,"/" . $this->_path_project . "/edit-info") == 0){
            $this->_dispath = new InfoController();
            $this->_isAdmin = true;
            return;
        }

        // Info
        if(strcmp($this->_url,"/" . $this->_path_project . "/admin-edit-info") == 0){
            $this->_dispath = new AdminInfoController();
            $this->_isAdmin = true;
            return;
        }

        // Voucher
        if(strcmp($this->_url,"/" . $this->_path_project . "/add-voucher") == 0){
            $this->_dispath = new AddVoucherController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/manage-voucher") == 0){
            $this->_dispath = new ManageVoucherController();
            $this->_isAdmin = true;
            return;
        }

        if(str_contains($this->_url, 'update-voucher')) {
            $voucherID = strrpos($this->_url, '=');
            $voucherID = substr($this->_url, $voucherID + 1);
            $this->_dispath = new UpdateVoucherController($voucherID);
            $this->_isAdmin = true;
            return;
        }

        if(str_contains($this->_url, '/login')) {
            $this->_dispath = new LoginController();
            $this->_isAdmin = true;
            return;
        }

        if(strcmp($this->_url,"/" . $this->_path_project . "/invoice-management") == 0){
            $this->_dispath = new InvoiceManagementController();
            $this->_isAdmin = true;
            return;
        }

        if(str_contains($this->_url, 'products')) {
            $productID = strrpos($this->_url, '=');
            $productID = substr($this->_url, $productID + 1);
            $this->_dispath = new ProductDetailController($productID);
            $this->_isAdmin = false;
            return;
        }

        if(str_contains($this->_url, 'search')) {
            $productSearchName = strrpos($this->_url, '=');
            $productSearchName = substr($this->_url, $productSearchName + 1);
            // echo $productSearchName;
            $this->_dispath = new SearchProductController($productSearchName);
            $this->_isAdmin = false;
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
