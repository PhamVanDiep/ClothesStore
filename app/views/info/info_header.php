<?php
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
require_once ROOT . DS . 'services' . DS . 'UserService.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';
$id = $_SESSION['login_id'];
$user_service = new UserService();
$get_user = $user_service->getUserByID($id);
?>