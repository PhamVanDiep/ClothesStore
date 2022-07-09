<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../../../public/css/root.css" />
        <link rel="stylesheet" href="../../../public/css/header.css" />
        <link rel="stylesheet" href="../../../public/css/footer.css" />
        <link rel="stylesheet" href="../../../public/css/body.css" />
        <link rel="stylesheet" href="../../../public/css/cart/cart.css" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php 
            require '../components/header.php';
        ?>
        
        <div class="body col-12">
            <div class="cart-title">
                <a> | Giỏ hàng</a>
            </div>
            <div class="list-header">
                    <label class="container" id="select-all">   
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <a> Chọn tất cả </a>    
                    
                </div>
            <div class="item-list">
                
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox" id="id1">
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox" >
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                <div class="item-info">
                    <label class="container">   
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="item">
                        <img class ="item-img" src="../../../public/res/img/products/product1.jpg"></img>
                        <div class = "item-name">Áo sơ mi nữ ngắn tay </div>
                    </div>
                        <div class = "item-variation">Màu trắng, XL  </div>
                    <div class = "item-price"> ₫100.000</div>
                    <div class = "quantity-select"> 
                   
                        <button class="btn-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                        <input class="quantity" id="id_form-0-quantity" min="1" value="1" type="number">
                        <button class="btn-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                    </div>
                    <button class= "btn-del" >Delete</button>
                </div>
                
            </div>
            <div class="purchase-info">
                <div class="delivery-info">
                    <div class="delivery-header">
                        <a>Giao hàng tới:</a>
                        <div>Thay đổi</div>
                    </div>
                    <div class="receiver-info">
                        <div class="receiver-name" >
                            Customer 1
                        </div>
                        <a>|</a>
                        <div class ="receiver-tel">
                            0899924343
                        </div>

                    </div>
                    <div class="delivery-address" >
                        <img src="../../../public/res/img\footer-image\location.png">
                        <div>178 Ngõ 999 Đại Cồ Việt, Hai Bà Trưng, Hà Nội</div>
                    </div>
                        
                </div>
                <div class = "cost-info">
                    <div class="total-items">
                        <a> Tổng: </a>
                        <a> 170.000 </a>
                    </div>
                    <div class="delivery-cost">
                        <a> Phí vận chuyển:</a>
                        <a> 15.000</a>
                    </div>
                    <div style="flex:1; border-bottom: 2px solid #b8b8b8"></div>
                    <div class ="total-cost">
                        <a> Tạm tính:</a>
                        <a id="total-cost"> 185.000</a>
                    </div>
                </div>

              
                <div class = "payment-info">
                    <a style="color:#b8b8b8"> Phương thức thanh toán </a>
                    <a> Thanh toán khi nhận hàng

                </div>
            <button class="btn-purchase">Mua hàng</button>
            </div>
            
            <?php 
            require '../components/footer.php';
            ?>
        </div>


      
    </body>
    <script  src="../../../public/js/cart.js"></script>
</html>