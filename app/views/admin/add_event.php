<?php 
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    // require_once ROOT . DS . 'libraries' . DS . 'admin' . DS . 'event' . DS . 'insert_event.php';
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
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div id="event-name" class="element">
                        <span class="element-title">Tên sự kiện</span>
                        <input type="text" id="eventName"  name="eventName" placeholder="Nhập tên sự kiện" required>
                    </div>
                    <!-- <div id="use-for" class="element">
                        <span class="element-title">Áp dụng cho</span>
                        <div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo thun</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo khoác</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo ba lỗ</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo sơ mi</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần jean</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần âu</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần đùi</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo thun</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo khoác</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo ba lỗ</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Áo sơ mi</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần jean</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần âu</label>
                        </div><div class="checkbox-category">
                            <input type="checkbox" name="" id="">
                            <label for="">Quần đùi</label>
                        </div>
                    </div> -->
                    <div id="start-end-time" class="element">
                        <div id="start-time" class="choose-time">
                            <span class="element-title">Thời gian bắt đầu</span>
                            <input type="date" require class="choose-date" id="startDate">
                            <input type="time" require class="choose-hour" id="startTime">
                        </div><div id="end-time" class="choose-time">
                            <span class="element-title">Thời gian kết thúc</span>
                            <input type="date" require class="choose-date" id="endDate">
                            <input type="time" require class="choose-hour" id="endTime">
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
                        <!-- <div class="event-image-wrap">
                            <img src="public/res/img/events/event1.jpg" class="event-img">
                            <span><img src="public/res/img/admin/remove.png"></span>
                        </div><div class="event-image-wrap">
                            <img src="public/res/img/events/event2.png" class="event-img">
                            <span><img src="public/res/img/admin/remove.png"></span>
                        </div><div class="event-image-wrap">
                            <img src="public/res/img/events/event1.jpg" class="event-img">
                            <span><img src="public/res/img/admin/remove.png"></span>
                        </div><div class="event-image-wrap">
                            <img src="public/res/img/events/event2.png" class="event-img">
                            <span><img src="public/res/img/admin/remove.png"></span>
                        </div><div class="event-image-wrap">
                            <img src="public/res/img/events/event1.jpg" class="event-img">
                            <span><img src="public/res/img/admin/remove.png"></span>
                        </div> -->
                    </div>
                    <div class="element" id="add-event-btn">
                        <input type="button" value="Tạo sự kiện" onclick="addEvent()">
                    </div>
                </form>
            </div>
        </div>
        <!-- <script src="public/js/add_event.js"></script> -->
        <script type="text/javascript">
            // const eventImageWraps = document.getElementsByClassName('event-image-wrap');
            let eventImage = document.getElementById('event-image');

            // console.log(eventImageWraps.length);
            let loadFile = function(event) {
                // console.log(event.target.files.length);
                for (let index = 0; index < event.target.files.length; index++) {
                    const element = event.target.files[index];
                    // eventImage.length++;
                    let newDiv = document.createElement('div');
                    newDiv.className = 'event-image-wrap';
                    newDiv.setAttribute('id', 'event-image-wrap' + index);
                    let newImageOutput = document.createElement('img');
                    newImageOutput.className = 'event-img';
                    newImageOutput.setAttribute('id', 'output'+ index);
                    newImageOutput.setAttribute('src', URL.createObjectURL(element));
                    newImageOutput.setAttribute('name', 'event_images[]');
                    newDiv.appendChild(newImageOutput);

                    let newRemoveSpan = document.createElement('span');
                    let newRemoveImg = document.createElement('img');
                    newRemoveImg.setAttribute('src', 'public/res/img/admin/remove.png');
                    newRemoveImg.setAttribute('id', 'remove'+ index);
                    newRemoveImg.onclick = function () {
                        document.getElementById('event-image-wrap'+index).remove();
                        // event.target.files
                        // console.log(event.target.files.length);
                    }
                    newRemoveSpan.appendChild(newRemoveImg);
                    newDiv.appendChild(newRemoveSpan);

                    eventImage.appendChild(newDiv);
                }
            };

            function getPostValue() {
                let name = document.getElementById("eventName").value;
                let startDate = document.getElementById("startDate").value;
                let startTime = document.getElementById("startTime").value;
                let endDate = document.getElementById("endDate").value;
                let endTime = document.getElementById("endTime").value;
                // let images = document.getElementsByClassName("event-img");
                // let event_images = "";

                // for (let index = 0; index < images.length; index++) {
                //     const element = images[index];
                //     event_images += element.getAttribute('src');
                // }

                let postValue = "name=" + name 
                                + "&timeStart=" + startDate + " " + startTime + ":00"
                                + "&timeEnd=" + endDate + " " + endTime + ":00";
                                // + "&event_images=" + event_images;

                return postValue;

                // let form_data = new FormData();
                // let total_files = document.getElementById("event-images");
                // let total_files_length = total_files.files.length;

                // for (let index = 0; index < total_files_length; index++) {
                //     form_data.append("files[]", total_files.files[index]);                    
                // }
                
                // return form_data;
            }

            function addEvent() {
                let form_data = getPostValue();
                // alert(form_data);
                const xhttp = new XMLHttpRequest();
                // xhttp.onload = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //         //document.getElementById("rs").innerHTML=this.responseText;
                //         // alert(this.responseText);
                //         console.log(this.responseText);
                //     }
                //     // console.log(this.responseText);
                // }
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        // alert(xhttp.responseText);
                        // let message = JSON.parse(xhttp.responseText);
                        console.log(xhttp.responseText);
                    }
                }
                xhttp.open("POST", "libraries/admin/event/insert_event.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(getPostValue());
            }
        </script>
    </body>
</html>