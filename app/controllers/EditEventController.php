<?php
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'ComponentsController.php';

class EditEventController extends ComponentsController implements Controller{
    private $_eventID;

    function __construct($eventID) {
        $this->_eventID = $eventID;
    }
    
    public function __render(){
        $eventID = $this->_eventID;
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'admin' . DS . 'edit_event.php';
    }
}