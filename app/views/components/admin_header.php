<?php
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    $id = $_SESSION['login_id'];
    $user_service = new UserService();
    $get_user = $user_service->getUserByID($id);

?>

<div class="col-12" id="header">
    <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="nav-wrap">
            <div class="bar1 bar"></div>
            <div class="bar2 bar"></div>
            <div class="bar3 bar"></div>
        </div>
    </div>
    <div id="header-title">
        <div id="category-title">
            <?php echo $title ?>
        </div><div id="category-subtitle">
            <?php echo $subtitle ?>
        </div>
    </div><div id="header-account">
        <div id="main-account">
            <div id="header-content-wrap">
                <div id="header-img-wrap">
                    <img src="<?php echo $get_user['urlAvatar']; ?>" >
                </div><div id="header-info-wrap">
                    <div id="admin-name">
                        <b><?php echo $get_user['name']; ?></b>
                    </div><div id="admin-title">
                        Manager
                    </div>
                </div>
            </div>
            <div id="dropdown-content">
                <a href="#">Thông tin cá nhân</a>
                <a href="/ClothesStore/logout">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<script src="public/js/admin_header.js"></script>