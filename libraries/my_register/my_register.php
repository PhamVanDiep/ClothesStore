<?php
    require_once '../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'RegisterService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';


    if (isset($_POST)) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $gender = $_POST['gender'];
        $roleID = 1;
        $urlAvatar = NULL;
     

        if ($password == $confirmedPassword) {
            $user = new User(0, $name, $username, $email, $phoneNumber, $gender, $password, $address, $roleID, $urlAvatar);
            $register_service = new RegisterService();
            $register_service->insert($user);
            header('Location: ../../login');
        } else {

        }

        
        
    }