<?php
    require_once '../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'EditInfoService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    session_start();
    $targetDir = "../../public/res/img/info/";
    if (isset($_POST)) {
        $userID = $_SESSION['login_id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $user_service = new UserService();
        $oldAvatar = $user_service->getUserAvatar($userID);
        $avatar = $oldAvatar['urlAvatar'];

        if ($_FILES['image']['name'] != NULL) {
            if ($avatar != NULL) {
                unlink($targetDir.$avatar);
            }
            $temp = explode(".", $_FILES['image']['name']);
            $avatar = $userID . '.' . end($temp);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $avatar);
        }

        if (str_contains($avatar, "public/res/img/info/")) {
            $urlAvatar = $avatar;
        } else {
            $urlAvatar = "public/res/img/info/" . $avatar;
        }

        $get_user = $user_service->getUserByID($userID);

        if ($get_user['googleId'] == null) {
            $user = new User($userID, $name, $username, $email, $phoneNumber, $gender, NULL, $address, NULL, $urlAvatar, NULL);
        } else {
            $user = new User($userID, $name, $username, $email, $phoneNumber, $gender, NULL, $address, NULL, $get_user['urlAvatar'], NULL);
        }
        $edit_service = new EditInfoService();
        $edit_service->update($user);

        // echo 'success';
        header('Location: /web/ClothesStore/edit-info');
    }
