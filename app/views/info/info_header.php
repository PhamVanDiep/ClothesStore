<?php
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'User.php';
require_once ROOT . DS . 'services' . DS . 'UserService.php';
require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';
$id = $_SESSION['login_id'];
$user_service = new UserService();
$get_user = $user_service->getUserByID($id);
?>

<div class="header col-12">
    <div class="main-header col-10">
        <div class="logo col-2">
            <div id="logo-wrap">
                <a href="#foot"><p>THDD</p></a>
            </div>
            <div class="mobile-cart-account">
                <div class="login">
                    <img src= "public/res/img/header-image/person.png" alt=""></img>
                </div>
                <div class="cart">
                    <img src= "public/res/img/header-image/cart.png" alt="" ></img>
                    <span class="circle">5</span>
                </div>
            </div>
        </div>
        <div class="search-wrap col-7">
            <div class="input-wrap col-8">
                <input type="text" placeholder="Nhập tên sản phẩm muốn tìm kiếm" ></input>
            </div>
            <div class="button-wrap col-3">
                <button class="search-btn">
                <img src= "public/res/img/header-image/search.png" alt="" id="search-btn"/>
                Tìm kiếm</button>
            </div>
        </div>
        <div class="login-cart col-3">
            <div class="wrap-user">
                <div class="login">
                    <img src= "public/res/img/header-image/person.png" alt=""></img>
                    <p><?php echo $get_user['username']?></p>
                </div>
                <div id="dropdown-content">
                    <a href="#">Thông tin cá nhân</a>
                    <a href="/ClothesStore/logout">Đăng xuất</a>
                </div>
            </div>
            <div class="cart">
                <img src= "public/res/img/header-image/cart.png" alt="" onclick="linkToCart()"></img>
                <span class="circle">5</span>
            </div>
        </div>
    </div>
</div>