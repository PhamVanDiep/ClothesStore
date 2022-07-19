<?php
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ComponentsController.php';

class InvoiceManagementController extends ComponentsController implements Controller{
    public function __render(){
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'admin' . DS . 'invoice.php';
    }
}