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
                $subtitle = "Thêm sản phẩm";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <form action="libraries/admin/product/insert_product.php" method="post" enctype="multipart/form-data" onsubmit="return checkNumOfImages(event)">
                    <div id="product-name" class="element element-text">
                        <span class="element-title">Tên sản phẩm</span>
                        <input type="text" id="productName"  name="productName" placeholder="Nhập tên sản phẩm" class="form-data" required>
                    </div>
                    <div id="product-description" class="element element-text">
                        <span class="element-title">Mô tả sản phẩm</span>
                        <textarea id="productDescription"  name="productDescription" placeholder="Nhập mô tả sản phẩm" class="form-data" required></textarea>
                    </div>
                    <div id="product-category" class="element element-text">
                        <span class="element-title">Loại sản phẩm</span>
                        <select name="category" id="category">
                            <option value="1">Quần</option>
                            <option value="2">Áo</option>
                        </select>
                    </div>
                    <div id="product-size" class="element element-text">
                        <span class="element-title">Kích cỡ sản phẩm</span>
                        <input type="text" id="productSizes"  name="productSizes" 
                            placeholder="Nhập các kích cỡ cho sản phẩm, cách nhau bởi dấu phẩy (,). VD: S,M,L" class="form-data" required>
                    </div>
                    <div id="product-style" class="element element-text">
                        <span class="element-title">Kiểu dáng sản phẩm</span>
                        <input type="text" id="productStyles"  name="productStyles" 
                            placeholder="Nhập các kiểu dáng cho sản phẩm, cách nhau bởi dấu phẩy (,). VD: Xanh,Đỏ,Vàng" class="form-data" required>
                    </div>
                    <div id="product-adv-price" class="element element-text">
                        <span class="element-title">Giá quảng cáo</span>
                        <input type="number" id="productAdvPrice"  name="productAdvPrice" placeholder="Nhập giá quảng cáo" class="form-data" required>
                    </div>
                    <div id="product-price" class="element element-text">
                        <span class="element-title">Giá bán</span>
                        <input type="number" id="productPrice"  name="productPrice" placeholder="Nhập giá bán" class="form-data" required>
                    </div>
                    <div id="event-image" class="element">
                        <div id="event-image-header">
                            <span id="event-image-title" class="element-title">Hình ảnh</span>
                            <input type="file" accept="image/*" name="files[]" id="event-images" multiple style="display: none;" onchange="loadFile(event)">
                            <label for="event-images">
                                <img src="public/res/img/admin/upload.png" id="upload-icon">
                            </label>
                        </div>
                    </div>
                    <div id="event-images-wrap" class="element"></div>
                    <div class="element" id="add-event-btn">
                        <input type="submit" value="Thêm sản phẩm" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            let eventImage = document.getElementById('event-images-wrap');
            let numCheck = 0;

            let loadFile = function(event) {
                let numberOfImages = event.target.files.length;
                numCheck = numberOfImages;
                
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

            function checkNumOfImages(event) { 
                if (numCheck == 0 || document.getElementById("event-images").value == "") {
                    event.preventDefault();
                    alert("Bạn chưa chọn ảnh cho sản phẩm!");
                    return false;
                }
                else return true;
            }
        </script>
    </body>
</html>