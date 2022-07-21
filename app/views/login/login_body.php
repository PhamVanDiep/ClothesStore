<?php global $path_project;
require_once ROOT . DS . 'libraries' . DS . 'my_login' . DS . 'google_log_in.php';
?>

<div class="login-body">
    <h2 class="body-title">Đăng nhập</h2>
    <form action="libraries\my_login\my_login.php" method="post">
        <div class="col-12">
            <div class="col-6">
                <img class="login-img" src="public/res/img/login/hello.png" alt="">
            </div>
            <div class="col-6">
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mật khẩu" name="password" required>
                <div class="wrap-method">
                    <div class="other-method col-12">
                        <h4 class=" method-title col-6">Đăng nhập nhanh bằng</h4>
                        <a style="color: #000;" class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">
                            <div class="method-item col-5"><i class="fa-brands fa-google"></i> Gmail</div>
                        </a>
                    </div>
                </div>
                <div class="wrap-login-button mt-16 col-12">
                    <input class="login-button" type="submit" value="Đăng nhập">
                </div>
                <div class="switch-login col-12 mt-16">
                    <a href=<?php echo "/$path_project/register" ?>>Đăng ký</a>
                </div>
            </div>
        </div>
    </form>
</div>
