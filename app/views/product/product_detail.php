<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../public/css/root.css" />
    <link rel="stylesheet" href="../../../public/css/header.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../public/css/body.css" />
    <link rel="stylesheet" href="../../../public/css/product/product_detail.css     " />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- header -->
    <?php
    require '../components/header.php';
    ?>

    <!-- body -->
    <div class="body col-12">
        <div class="card-wrapper col-10">
            <div class="content-card col-10">
                <div class="box-card col-12">
                    <div class="card">
                        <!-- card left -->
                        <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt="shoe image">
                                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt="shoe image">
                                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt="shoe image">
                                    <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt="shoe image">
                                </div>
                            </div>
                            <div class="img-select">
                                <div class="img-item">
                                    <a href="#" data-id="1">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt="shoe image">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="2">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt="shoe image">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="3">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt="shoe image">
                                    </a>
                                </div>
                                <div class="img-item">
                                    <a href="#" data-id="4">
                                        <img src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt="shoe image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card right -->
                        <div class="product-content">
                            <h2 class="product-title">Áo phông tay lỡ Hàn Quốc, áo phông màu trắng form rộng unisex, áo thun 1k, áo phông 1k TEE SHOP 35-70kg|| Mã ATU1s</h2>
                            <a href="#" class="product-link">visit nike store</a>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>4.7(21)</span>
                            </div>

                            <div class="product-price">
                                <p class="last-price">Old Price: <span>257.000Đ</span></p>
                                <p class="new-price">New Price: <span>200.000Đ (5%)</span></p>
                            </div>

                            <div class="product-detail">
                                <h2>Thông tin sản phẩm: </h2>
                                <p>Sản phẩm với mẫu mã đa dạng, phù hợp với mọi lứa tuổi</p>
                                <p>Với những thông tin mới hoàn toàn phù hợp, đep mắt</p>
                                <ul>
                                    <li> Màu sắc: <span>Đen</span></li>
                                    <li>Trạng thái: <span>Còn hàng</span></li>
                                    <li>Loại: <span>Giày</span></li>
                                    <li>Vận Chuyển tới: <span> Số 10A, Tân Mai Hoàng Mai</span> </li>
                                    <li>Phí Ship: <span>30k</span></li>
                                </ul>
                            </div>

                            <div class="purchase-info">
                                <input type="number" min="0" value="1">
                                <button type="button" class="btn">
                                    Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button type="button" class="btn">Mua Hàng</button>
                            </div>

                            <div class="social-links">
                                <p>Share At: </p>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-product-detail col-10">
            <div class="bar-product-detail-1 col-11">
                <p>CHI TIẾT SẢN PHẨM</p>
            </div>

            <div class="content-product-detail">
                <div class="product-d-length">
                    <div class="length-name">
                        <p>Chiều dài áo</p>
                    </div>
                    <div class="length-value">
                        <p>Đều đặn</p>
                    </div>
                </div>

                <div class="product-d-madein">
                    <div class="madein-name">
                        <p>Xuất xứ</p>
                    </div>
                    <div class="madein-value">
                        <p>Trung Quốc</p>
                    </div>
                </div>

                <div class="product-d-material">
                    <div class="material-name">
                        <p>Chất liệu</p>
                    </div>
                    <div class="material-value">
                        <p>Contton</p>
                    </div>
                </div>

                <div class="product-d-color">
                    <div class="color-name">
                        <p>Màu</p>
                    </div>
                    <div class="color-value">
                        <p>In</p>
                    </div>
                </div>

                <div class="product-d-session">
                    <div class="session-name">
                        <p>Mùa</p>
                    </div>
                    <div class="session-value">
                        <p>Mùa hè</p>
                    </div>
                </div>

                <div class="product-d-collar">
                    <div class="collar-name">
                        <p>Cổ áo</p>
                    </div>
                    <div class="collar-value">
                        <p>Cổ tròn</p>
                    </div>
                </div>

                <div class="product-d-hand">
                    <div class="hand-name">
                        <p>Tay áo</p>
                    </div>
                    <div class="hand-value">
                        <p>Dài 3/10</p>
                    </div>
                </div>

            </div>

            <div class="bar-product-detail-2 col-11">
                <p>MÔ TẢ SẢN PHẨM</p>
            </div>

            <div class="product-description-content">
                <pre>
                    Shop đang có chương trình sale áo thun 1k, áo phông 1k, balo 1k, túi đeo 1k, áo thun 1k freeship, áo phông 1k freeship, balo 1k freeship, túi đeo 1k freeship, nếu bạn là người mua mới chưa mua hàng lần nào và có mã freeship.
                    Bạn muốn xem áo thun 1k, áo phông 1k thì vào danh mục TEE sale 1k nha.

                    Áo phông tay lỡ Hàn Quốc, áo phông màu trắng form rộng unisex TEE SHOP 35-70kg|| Mã ATU1

                    1. Tên sản phẩm: Áo phông tay lỡ Hàn Quốc, áo phông màu trắng form rộng unisex TEE SHOP 35-70kg || Mã ATU1
                    2. Vì Sao sản phẩm của TEE SHOP sẽ phù hợp với bạn?
                    Bạn đang tìm kiếm 1 chiếc Áo phông tay lỡ , 1 chiếc áo thun phải có tay lỡ, 1 chiếc áo thun hàn quốc cho nữ đẹp, 1 chiếc áo thun màu trắng thuần khiết? Nhưng có giá phải chăng? TEE SHOP chúc mừng bạn đã tìm đúng nơi mình thuộc về, ở đây chúng mình có rất nhiều mẫu áo thun nữ form rộng đáp ứng được mọi nhu cầu khắt khe của bạn.

                    3. Thông số Áo phông tay lỡ

                    + Chất liệu: Chất liệu cotton pha Spandex chống nhăn áo
                    + Hình in: Hình in nhiệt hoặc lụa công nghệ mới không bị phai mời
                    + Size: M(35-50kg); L(51-70kg)


                </pre>
            </div>
        </div>
    </div>






    <!-- footer -->
    <?php
    require '../components/footer.php';
    ?>
</body>

</html>