<?php
require_once ROOT . DS . 'services' . DS . 'UserService.php';

if(!isset($_SESSION['login_id'])){
    header('Location: /ClothesStore/logout');
    exit;
}

$id = $_SESSION['login_id'];
$user_service = new UserService();
$get_user = $user_service->getUserByID($id);

if($get_user['roleID'] != 2) {
    header('Location: /ClothesStore/logout');
    exit;
}
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/add_event.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="col-10" id="head-bar">
            <?php 
                $title = "Sự kiện";
                $subtitle = "Thêm sự kiện";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <form action="libraries/admin/event/insert_event.php" method="post" enctype="multipart/form-data" onsubmit="return checkNumOfImages(event)" >
                    <div id="event-name" class="element">
                        <span class="element-title">Tên sự kiện</span>
                        <input type="text" id="eventName"  name="eventName" placeholder="Nhập tên sự kiện" class="form-data" required>
                    </div>
                    <div id="start-end-time" class="element">
                        <div id="start-time" class="choose-time">
                            <span class="element-title">Thời gian bắt đầu</span>
                            <input type="date" require class="choose-date" class="form-data" id="startDate" name="startDate" required>
                            <input type="time" require class="choose-hour" class="form-data" id="startTime" name="startTime" required>
                        </div><div id="end-time" class="choose-time">
                            <span class="element-title">Thời gian kết thúc</span>
                            <input type="date" require class="choose-date" class="form-data" id="endDate" name="endDate" required>
                            <input type="time" require class="choose-hour" class="form-data" id="endTime" name="endTime" required>
                        </div>
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
                        <input type="submit" value="Tạo sự kiện">
                    </div>
                </form>
            </div>
        </div>
        <!-- <script src="public/js/add_event.js"></script> -->
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
                    alert("Bạn chưa chọn ảnh cho sự kiện!");
                    return false;
                }
                else return true;
            }
        </script>
    </body>
</html>