<?php
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ComponentsController.php';

class UpdateVoucherController extends ComponentsController implements Controller{
    private $_voucherID;

    function __construct($voucherID) {
        $this->_voucherID = $voucherID;
    }

    public function __render(){
        $voucherID = $this->_voucherID;
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'admin' . DS . 'edit_voucher.php';
    }
}