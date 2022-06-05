<?php
class ComponentsController {
    /*include header*/
    public function __header(){
        include ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
    }

    /*include footer*/
	public function __footer(){
        include ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'footer.php';
    }
}