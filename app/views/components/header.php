<?php
    global $path_project;
?>

<div class="header col-12">
    <div class="main-header col-10">
        <div class="logo col-2">
            <div id="logo-wrap">
                <a href=<?php echo "/" . $path_project ; ?>><p>THDD</p></a>
            </div>
            <div class="mobile-cart-account">
                <a href=<?php echo "/" . $path_project . "/" . "cart"?>>
                    <div class="cart">
                        <img src= "public/res/img/header-image/cart.png" alt="" ></img>
                        <span class="circle">5</span>
                    </div>
                </a>
                <div class="login">
                    <img src= "public/res/img/header-image/person.png" alt=""></img>
                </div>
            </div>
        </div>
        <div class="search-wrap col-7">
            <div class="input-wrap col-5">
                <input type="text" placeholder="Nhập tên sản phẩm muốn tìm kiếm" id="search-input-text" />
            </div>
            <div class="button-wrap col-2">
                <button class="search-btn" id="search-button" onclick="searchByName()">
                <img src= "public/res/img/header-image/search.png" alt="" id="search-btn"/>
                Tìm kiếm</button>
            </div>
        </div>
        <div class="login-cart col-3">
            <div class="login">
                <img src= "public/res/img/header-image/person.png" alt=""></img>
                <span><a href=<?php echo "/" . $path_project . "/" . "register"?>>Đăng ký</a></span>
                <span>/</span>
                <span><a href=<?php echo "/" . $path_project . "/" . "login"?>>Đăng nhập</a></span>
            </div>
            <a href=<?php echo "/" . $path_project . "/" . "cart"?>>
                <div class="cart">
                    <img src= "public/res/img/header-image/cart.png" alt=""></img>
                    <span class="circle">5</span>
                </div>
            </a>
        </div>
    </div>
</div>
<script src="public/js/header.js"></script>