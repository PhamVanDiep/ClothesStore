<?php
    require_once '../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'EditInfoService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    session_start();
    if (isset($_POST)) {
        $userID = $_SESSION['login_id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        // insert event
        $user = new User($userID, $name, $username, $email, $phoneNumber, $gender, NULL, $address, NULL, NULL, NULL);
        $edit_service = new EditInfoService();
        $edit_service->update($user);

        header('Location: /web/ClothesStore/edit-info');
    }