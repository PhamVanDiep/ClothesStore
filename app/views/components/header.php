<?php
    global $path_project;
    // $path = $_SERVER['REQUEST_URI'];
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
                        <!-- <span class="circle">5</span> -->
                    </div>
                </a>
                <div class="login">
                    <img src= "public/res/img/header-image/person.png" id="user-res" />
                    <div id="dropdown-content-res">
                        <?php
                            if (!isset($_SESSION['login_id'])) {
                                echo '<a href="/web/ClothesStore/register">Đăng ký</a>'
                                    .'<a href="/web/ClothesStore/login">Đăng nhập</a>';
                            } else {
                                echo '<a href="/web/ClothesStore/edit-info">Thông tin cá nhân</a>'
                                    . '<a href="/web/ClothesStore/orders">Đơn hàng</a>'
                                    . '<a href="/web/ClothesStore/logout">Đăng xuất</a>';
                            }
                        ?>
                    </div>
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
            <?php 
                if (!isset($_SESSION['login_id'])) {
                    echo '<div class="login">'
                            . '<img src= "public/res/img/header-image/person.png" alt="" />'
                            . '<span><a href="' . DS . $path_project . DS . 'register' . '">Đăng ký</a></span>'
                            . '<span>/</span>'
                            . '<span><a href="' . DS . $path_project . DS . 'login' . '">Đăng nhập</a></span>'
                        . '</div>';
                } else {
                    require_once ROOT . DS . 'services' . DS . 'UserService.php';

                    $id = $_SESSION['login_id'];
                    $user_service = new UserService();
                    $get_user = $user_service->getUserByID($id);

                    echo '<div id="main-account">'
                            . '<div id="header-content-wrap">'
                                . '<div id="header-img-wrap">'
                                    . '<img src="' . $get_user['urlAvatar'] . '" >'
                                . '</div><div id="header-info-wrap">'
                                    . '<div id="user-name">'
                                        . '<b>' . $get_user['username'] . '</b>'
                                    . '</div>'
                                . '</div>'
                            . '</div>'
                        . '<div id="dropdown-content">
                                <a href="/web/ClothesStore/edit-info">Thông tin cá nhân</a>
                                <a href="/web/ClothesStore/orders">Đơn hàng</a>
                                <a href="/web/ClothesStore/logout">Đăng xuất</a>
                            </div>'
                        .'</div>';
                }
            ?>
            <a href=<?php echo "/" . $path_project . "/" . "cart"?>>
                <div class="cart">
                    <img src= "public/res/img/header-image/cart.png" alt=""></img>
                    <!-- <span class="circle">5</span> -->
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    let isDisplayedRes = false;
    let dropdown_res = document.getElementById("dropdown-content-res");
    let avatar_res = document.getElementById("user-res");

    avatar_res.onclick = clicked;
    function clicked() {
        if (isDisplayedRes == false) {
            isDisplayedRes = true;
            dropdown_res.style.display = "block";
        } else {
            isDisplayedRes = false;
            dropdown_res.style.display = "none";
        }
    }

    function searchByName() {
        let search = document.getElementById("search-input-text").value;
        if (search.length > 0) {
            window.location.href = '/web/ClothesStore/search?product-name=' + search;
        }
    }

    document.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            searchByName()
        }
    });
</script>
<?php if (isset($_SESSION['login_id'])) echo '<script src="public/js/header.js"></script>' ?>