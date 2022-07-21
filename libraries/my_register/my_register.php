<?php
    require_once '../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'RegisterService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';
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
        $urlAvatar = 'public/res/img/info/avt.png';
        $googleId = NULL;
     

        if ($password == $confirmedPassword) {
            $user_service = new UserService();
            $getUser = $user_service->getUserByEmail($email);
            if (is_null($getUser)) {
                $user = new User(0, $name, $username, $email, $phoneNumber, $gender, $password, $address, $roleID, $urlAvatar, $googleId);
                $register_service = new RegisterService();
                $checkRegister = $register_service->insert($user);
                $new_user = $user_service->getUserByEmail($email);
                $user_service->addCart($new_user['userID']);
                if (is_null($checkRegister)) {
                    header('Location: ../../login');
                } else {
                    echo 'Fail';
                }
            } else {
                header('Location: ../../register');
            }
        } else {
            header('Location: ../../register');
        }

        
        
    }