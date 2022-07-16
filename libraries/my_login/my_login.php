<?php
    require_once '../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    session_start();
    if (isset($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_service = new UserService();
        $get_user = $user_service->getUserByEmail($email);

        // $_SESSION['login_id'] = $get_user['userID']; 
        // header('Location: /ClothesStore/home-test');
        
        if (is_null($get_user)) {
            header('Location: /ClothesStore/edit-info');
        } else {
            if (strcmp($password, $get_user['password']) == 0) {
                $_SESSION['login_id'] = $get_user['userID']; 
                if ($get_user['roleID'] == 1) {
                    header('Location: /ClothesStore/edit-info');
                } else if ($get_user['roleID'] == 2) {
                    header('Location: /ClothesStore/manage-voucher');
                }
                exit;
            } else {
                header('Location: /ClothesStore/login');
            }
        }
        
    }