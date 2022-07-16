<?php
    require_once ROOT . DS . 'services' . DS . 'ProductService.php';
    $product_service = new ProductService();
    $categories = $product_service->getCategories(); // get all categories

    $product_info = $product_service->getOnce($productID);
    $productName = $product_info['name'];
    $categoryID = $product_info['categoryID'];
    $price = $product_info['price'];
    $oldPrice = $product_info['oldPrice'];
    $description = $product_info['description'];

    // get sizes of product
    $sizeRoot = $product_service->getSizeByID($productID);
    $size_string = "";
    foreach($sizeRoot as $size) {
        $size_string = $size['name'] . ", " . $size_string; 
    }
    $size_string = substr($size_string, 0, -2);

    // get types of product
    $typeRoot = $product_service->getTypeByID($productID);
    $type_string = "";
    foreach($typeRoot as $type) {
        $type_string = $type['name'] . ", " . $type_string;
    }
    $type_string = substr($type_string, 0, -2);

    $images = $product_service->getAllImages($productID);
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/add_product.css" />
        <link rel="stylesheet" href="public/css/admin/add_event.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php 
                $title = "Sản phẩm";
                $subtitle = "Cập nhật sản phẩm";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <form action="libraries/admin/product/update_product.php" method="post" enctype="multipart/form-data" onsubmit="return checkNumOfImages(event)">
                    <input type="hidden" name="productID" value=<?php echo "'" . $productID . "'"; ?> />
                    <div id="product-name" class="element element-text">
                        <span class="element-title">Tên sản phẩm</span>
                        <input type="text" id="productName"  name="productName" 
                            placeholder="Nhập tên sản phẩm" class="form-data" required value=<?php echo "'" . $productName . "'"; ?>>
                    </div>
                    <div id="product-description" class="element element-text">
                        <span class="element-title">Mô tả sản phẩm</span>
                        <textarea id="productDescription"  name="productDescription" 
                            placeholder="Nhập mô tả sản phẩm" class="form-data" required><?php echo $description; ?>
                        </textarea>
                    </div>
                    <div id="product-category" class="element element-text">
                        <span class="element-title">Loại sản phẩm</span>
                        <select name="category" id="category">
                            <?php
                                foreach($categories as $category) {
                                    if ($category['categoryID'] === $categoryID) {
                                        echo "<option value='" . $category['categoryID'] . "' selected>" . $category['name'] . "</option>";
                                    }
                                    else echo "<option value='" . $category['categoryID'] . "'>" . $category['name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div id="product-size" class="element element-text">
                        <span class="element-title">Kích cỡ sản phẩm</span>
                        <input type="text" id="productSizes"  name="productSizes" 
                            placeholder="Nhập các kích cỡ cho sản phẩm, cách nhau bởi dấu phẩy (,). VD: S,M,L" 
                            class="form-data" required value=<?php echo "'" . $size_string . "'"; ?>>
                    </div>
                    <div id="product-style" class="element element-text">
                        <span class="element-title">Kiểu dáng sản phẩm</span>
                        <input type="text" id="productStyles"  name="productStyles" 
                            placeholder="Nhập các kiểu dáng cho sản phẩm, cách nhau bởi dấu phẩy (,). VD: Xanh,Đỏ,Vàng" 
                            class="form-data" required value=<?php echo "'" . $type_string . "'"; ?>>
                    </div>
                    <div id="product-adv-price" class="element element-text">
                        <span class="element-title">Giá quảng cáo</span>
                        <input type="number" id="productAdvPrice"  name="productAdvPrice" 
                        placeholder="Nhập giá quảng cáo" class="form-data" required value=<?php echo "'" . $oldPrice . "'"; ?>>
                    </div>
                    <div id="product-price" class="element element-text">
                        <span class="element-title">Giá bán</span>
                        <input type="number" id="productPrice"  name="productPrice" 
                        placeholder="Nhập giá bán" class="form-data" required value=<?php echo "'" . $price . "'"; ?>>
                    </div>
                    <div id="event-image" class="element">
                        <div id="event-image-header">
                            <span id="event-image-title" class="element-title">Hình ảnh</span>
                            <input type="file" accept="image/*" name="files[]" id="event-images" multiple style="display: none;" onchange="loadFile(event)">
                            <label for="event-images">
                                <img src="public/res/img/admin/upload.png" id="upload-icon">
                            </label>
                        </div>
                        <?php
                            $num = 0;
                            $targetDir = "public/res/img/products/";
                            foreach ($images as $image) {
                                echo "<div id='event-image-wrap-old" . $num . "' class='event-image-wrap'>"
                                    . "<img class='event-img' id = 'output". $num . "' src='" . $targetDir . $image['urlimage'] . "' name='event_images[]' />" 
                                    . "<input type='hidden' name='event_images[]' value='" . $image['urlimage'] . "' />"
                                    . "<span><img src='public/res/img/admin/remove.png' id='remove" . $num . "' onclick='removeImage(". $num .")' /></span>"
                                    . "</div>";
                                    $num++;
                            }
                        ?>
                    </div>
                    <div id="event-images-wrap" class="element"></div>
                    <div class="element" id="add-event-btn">
                        <input type="submit" value="Lưu thay đổi" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            let eventImage = document.getElementById('event-images-wrap');
            let numCheck = document.getElementsByClassName('event-image-wrap').length;

            let loadFile = function(event) {
                let numberOfImages = event.target.files.length;
                numCheck += numberOfImages;
                
                eventImage.innerHTML = "";

                for (let index = 0; index < numberOfImages; index++) {
                    const element = event.target.files[index];

                    let newDiv = document.createElement('div');
                    newDiv.className = 'event-image-wrap';
                    newDiv.setAttribute('id', 'event-image-wrap' + index);
                    let newImageOutput = document.createElement('img');
                    newImageOutput.className = 'event-img';
                    newImageOutput.setAttribute('id', 'output' + index);
                    newImageOutput.setAttribute('src', URL.createObjectURL(element));
                    newImageOutput.setAttribute('name', 'event_images[]');
                    newDiv.appendChild(newImageOutput);

                    // create hidden image input name
                    let newImageOutputName = document.createElement('input');
                    newImageOutputName.setAttribute('type', 'hidden');
                    newImageOutputName.setAttribute('name', 'event_images[]');
                    newImageOutputName.value = element.name;
                    newDiv.appendChild(newImageOutputName);

                    let newRemoveSpan = document.createElement('span');
                    let newRemoveImg = document.createElement('img');
                    newRemoveImg.setAttribute('src', 'public/res/img/admin/remove.png');
                    newRemoveImg.setAttribute('id', 'remove' + index);
                    newRemoveImg.onclick = function () {
                        document.getElementById('event-image-wrap' + index).remove();
                        numCheck--;
                    }
                    newRemoveSpan.appendChild(newRemoveImg);
                    newDiv.appendChild(newRemoveSpan);

                    eventImage.appendChild(newDiv);
                }
            };

            function removeImage(index) {
                document.getElementById('event-image-wrap-old' + index).remove();
                numCheck--;
            }

            function checkNumOfImages(event) {
                if (numCheck == 0) {
                    event.preventDefault();
                    alert("Sản phẩm này chưa có ảnh!");
                    return false;
                }
                else return true;
            }
        </script>
    </body>
</html>