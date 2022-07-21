<?php
    global $path_project;
    require_once ROOT . DS . 'services' . DS . 'CartService.php';
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    require_once ROOT . DS . 'services' . DS . 'UserService.php';
    if(!isset($_SESSION['login_id'])){
        header('Location: /web/ClothesStore/logout');
        exit;
    }

    $id = $_SESSION['login_id'];
    $cart_service = new CartService();
    $userService = new UserService();
    $user = $userService->getUserByID($id);
 ?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/root.css" />
        <link rel="stylesheet" href="public/css/header.css" />
        <link rel="stylesheet" href="public/css/footer.css" />
        <link rel="stylesheet" href="public/css/body.css" />
        <link rel="stylesheet" href="public/css/cart/cart.css" />
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Giỏ hàng</title>
    </head>
    <body>
    <div class="col-10" id="head-bar">
        <?php
        require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'header.php';
        ?>
    </div>
  
        
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
                    <div style="flex:1"></div>
                     <button id= "btn-del-select" >Delete</button>
                    
                </div>
            <div class="item-list" id="item-list">
                <?php 
                    $cart = $cart_service->getListCartProducts($_SESSION['login_id']);
                    $product_service = new ProductService();
                    
                    foreach($cart as $product ){
                        $productID = $product['productID'];
                        $url_img = $product_service->getImageHomepage($productID);
                        echo'<div class="item-info" id="'.$productID.'">
                                <label class="container">   
                                    <input type="checkbox" >
                                    <span class="checkmark"></span>
                                </label>
                                <div class="item">
                                    <img class ="item-img" src="public/res/img/products/'.$url_img.'"></img>
                                    <div class = "item-name">'. $product['name'].' </div>
                                </div>
                                    <div class = "item-variation">'.$product['type'].', '. $product['size'].'</div>
                                <div class = "item-price"> ₫'  . number_format($product['price']) .'</div>
                                <div class = "quantity-select"> 
                            
                                    <button class="btn-decrease" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">-</button>
                                    <input class="quantity" id="id_form-0-quantity" min="1" value="'. $product['number'].'" type="number">
                                    <button class="btn-increase" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">+</button>
                                </div>
                                <button class= "btn-del" >Delete</button>
                            </div>';
                            
                    }
                ?>
                
              

                
            </div>
            <div class="purchase-info sticky">
                <div class="delivery-info">
                    <div class="delivery-header">
                        <a>Giao hàng tới:</a>
                        
                    </div>
                    <div class="receiver-info">
                        <div class="receiver-name" >
                            <?php echo $user['name']?>
                        </div>
                        <a>|</a>
                        <div class ="receiver-tel">
                            <?php echo $user['phoneNumber']?> 
                        </div>

                    </div>
                    <div class="delivery-address" >
                        <img src="public/res/img\footer-image\location.png">
                        <div> <?php echo $user['address']?> </div>
                    </div>
                        
                </div>
                <div class = "cost-info">
                    <div class="total-items">
                        <a> Tổng: </a>
                        <a id="total-item"> </a>
                    </div>
                    <div class="delivery-cost" style="visibility: hidden">
                        <a> Phí vận chuyển:</a>
                        <a id ="delivery-cost"> 15.000</a>
                    </div>
                    <div class="voucher-discount" style="visibility: hidden">
                        <a> Voucher:</a>
                        <a id ="voucher-discount" ></a>
                    </div>
                    <div style="flex:1; border-bottom: 2px solid #b8b8b8"></div>
                    <div class ="total-cost">
                        <a> Tạm tính:</a>
                        <a id="total-cost">  </a>
                    </div>
                </div>

              
                <div class = "payment-info">
                    <a style="color:#b8b8b8"> Phương thức thanh toán </a>
                    <a> Thanh toán khi nhận hàng</a>

                </div>
                <div class = "voucher-select">
                    <a style="color:#b8b8b8"> Voucher </a>
                    <select id="voucher-selector" default="">
                        <option value="0"style="display:none; font-weight: normal;" >Chọn voucher</option>
                        <!-- <option value="10" >MUAHEXANH - Giảm 10%</option>
                        <option value="15">MUAHEXANH - Giảm 15%</option>
                        <option value="5">MUAHEXANH - Giảm 5%</option>
                        <option value="5">MUAHEXANH - Giảm 5%</option>
                        <option value="5">MUAHEXANH - Giảm 5%</option>
                        <option value="2">MUAHEXANH - Giảm 2%</option> -->
                    </select>

                </div>
            <button class="btn-purchase" id="btn-purchase">Mua hàng</button>
            </div>
            
            <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'footer.php';
            ?>
        </div>


      
    </body>
    <script  src="public/js/cart.js"></script>
</html>
