<?php global $path_project; ?>
<div class="login-body">
    <h2 class="body-title">Đăng ký</h2>
    <div class="col-12">
        <form action="libraries\my_register\my_register.php" method="post">
            <div class="col-6">
                <input type="text" placeholder="Họ tên" name="name" required>
                <input type="text" placeholder="Username" name="username" required>
                <input type="text" placeholder="Email" name="email">
                <input type="text" placeholder="Điện thoại" name="phoneNumber" required>
                <input type="text" placeholder="Địa chỉ" name="address" required>
                
            </div>
            <div class="col-6">
                <input type="password" placeholder="Mật khẩu" name="password" required>
                <input type="password" placeholder="Xác nhận mật khẩu" name="confirmedPassword" required>
                <div class="login-gender-wrap">
                    <div class="login-gender">
                        <h4 class="item-gender">Giới tính</h4>
                        <div class="item-gender">
                            <input id="man" value="Nam" type="radio" name="gender" required>
                            <label for="man">Nam</label>
                        </div>
                        <div class="item-gender">
                            <input id="woman" value="Nữ" type="radio" name="gender">
                            <label for="woman">Nữ</label>
                        </div>
                        <div class="item-gender">
                            <input id="other" value="Khác" type="radio" name="gender">
                            <label for="other">Khác</label>
                        </div>
                    </div>
                </div>
                <div class="wrap-method">
                    <h4>Đăng nhập nhanh bằng</h4>
                    <div class="other-method col-12">
                        <div class="method-item col-4" style="color: #1873E7;"><i class="fa-brands fa-facebook"></i> Facebook</div>
                        <div class="method-item col-3"><i class="fa-brands fa-google"></i> Gmail</div>
                        <div class="method-item col-4"><i class="fa-solid fa-phone"></i> Điện thoại</div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-16">
                <div class="wrap-login-button">
                    <input class="login-button" type="submit" value="Đăng ký">
                </div>
                <div class="switch-login col-12 mt-16">
                    <a href=<?php echo "/$path_project/login" ?>>Đăng nhập</a>
                </div>
            </div>
        </form>
    </div>
</div>