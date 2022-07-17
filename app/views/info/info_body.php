<?php
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
require_once ROOT . DS . 'services' . DS . 'RegisterService.php';
require_once ROOT . DS . 'services' . DS . 'UserService.php';
require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

if(!isset($_SESSION['login_id'])){
    header('Location: /ClothesStore/logout');
    exit;
}

$id = $_SESSION['login_id'];

$user_service = new UserService();
$user = $user_service->getUserByID($id);
$checkGoogleUser = !is_null($user['googleId']);

if (is_null($user)) {
    header('/ClothesStore/logout');
}
?>

<div class="info-body">
    <div class="body-header">
        <img src="public/res/img/info/user.png" alt="">
        <div class="wrap-title">
            <h2>Hồ sơ của tôi</h2>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
    </div>
    <hr>
    <div class="wrap-content">
        <form action="libraries\edit_info\edit_info.php" method="post">
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
                        <input type="file"  accept="image/*" name="image" id="selectedFile"  onchange="loadFile(event)" style="display: none;">
                        <input type="button" value="Chọn ảnh" onclick="document.getElementById('selectedFile').click();" <?php if($checkGoogleUser) echo 'disabled';?> />
                        <?php
                            if($checkGoogleUser) echo '<p style="text-align:center;color:red;">Bạn không thể thay đổi ảnh từ tài khoản Google.</p>';
                        ?>
                        <script>
                        var loadFile = function(event) {
                            var image = document.getElementById('output');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                    </div>
                </div>
            </div>
            <?php

            ?>
            <div class="col-12" style="margin-top: 32px;">
                <input type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
</div>