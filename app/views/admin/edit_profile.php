<?php
require_once ROOT . DS . 'services' . DS . 'UserService.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
require_once ROOT . DS . 'services' . DS . 'RegisterService.php';
require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

if(!isset($_SESSION['login_id'])){
    header('Location: /web/ClothesStore/logout');
    exit;
}

$id = $_SESSION['login_id'];
$user_service = new UserService();
$user = $user_service->getUserByID($id);

if (is_null($user)) {
    header('Location: /web/ClothesStore/logout');
}

if($user['roleID'] != 2) {
    header('Location: /web/ClothesStore/logout');
    exit;
}
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/edit_profile.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Thông tin cá nhân</title>
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php 
                $title = "Thông tin cá nhân";
                $subtitle = "";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div class="col-10" id="content">
            <div id="body">
                <div class="wrap-content">
                    <form action="libraries/admin/profile/edit_profile.php" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <div class="col-7 pl-6">
                                <input type="hidden" value="<?php echo $id?>">
                                <div class="wrap-input">
                                    <label for="">Họ tên:</label>
                                    <input name="name" value="<?php echo $user['name']?>" type="text"><br>
                                </div>
                                <div class="wrap-input">
                                    <label for="">Username:</label>
                                    <input name="username" value="<?php echo $user['username']?>" type="text"><br>
                                </div>
                                <div class="wrap-input">
                                    <label for="">Điện thoại:</label>
                                    <input name="phoneNumber" value="<?php echo $user['phoneNumber']?>" type="text"><br>
                                </div>
                                <div class="wrap-input">
                                    <label for="">Địa chỉ:</label>
                                    <input name="address" value="<?php echo $user['address']?>" type="text"><br>
                                </div>
                                <div class="wrap-input">
                                    <label for="">Email:</label>
                                    <input name="email" value="<?php echo $user['gmail']?>" type="text"><br>
                                </div>
                                <div class="wrap-input">
                                    <label for="">Giới tính:</label>
                                    <input id="man" type="radio" name="gender" value="Nam" <?php if (strcmp($user['gender'],'Nam')==0) echo 'checked';?>>
                                    <label for="man">Nam</label>
                                    <input id="woman" type="radio" name="gender" value="Nữ" <?php if (strcmp($user['gender'],'Nữ')==0) echo 'checked';?>>
                                    <label for="woman">Nữ</label>
                                    <input id="other" type="radio" name="gender" value="Khác" <?php if (strcmp($user['gender'],'Khác')==0) echo 'checked';?>>
                                    <label for="other">Khác</label><br>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="wrap-edit-avt">
                                    <img id="output" src="<?php echo $user['urlAvatar']?>" alt="">
                                    <input type="file" accept="image/*" name="image" id="image"  onchange="loadFile(event)" style="display: none;">
                                    <input type="button" value="Chọn ảnh" onclick="document.getElementById('image').click();">
                                    <script>
                                    var loadFile = function(event) {
                                        var image = document.getElementById('output');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 32px;">
                            <input type="submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>