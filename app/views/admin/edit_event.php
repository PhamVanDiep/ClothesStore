<?php

    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    $event_service = new EventService();
    $event = $event_service->getOnce($eventID);

    $event_name = $event['name'];
    $event_start_date_time = $event['timeStart'];
    $event_end_date_time = $event['timeEnd'];

    $start_date_time_formatter = new DateTime($event_start_date_time);
    $start_date = $start_date_time_formatter->format('Y-m-d');
    $start_time = $start_date_time_formatter->format('H:i');
    
    $end_date_time_formatter = new DateTime($event_end_date_time);
    $end_date = $end_date_time_formatter->format('Y-m-d');
    $end_time = $end_date_time_formatter->format('H:i');

    $images = $event_service->getAllImages($eventID);
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
                $title = "Quản lý sự kiện";
                $subtitle = "Cập nhật sự kiện";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <form action="libraries/admin/event/update_event.php" method="post" enctype="multipart/form-data" id="update-form" onsubmit="return checkNumOfImages(event)">
                    <input type="hidden" name="eventID" value=<?php echo "'" . $eventID . "'"; ?> />
                    <div id="event-name" class="element">
                        <span class="element-title">Tên sự kiện</span>
                        <input type="text" id="eventName"  name="eventName" placeholder="Nhập tên sự kiện" class="form-data" required value=<?php echo "'" . $event_name . "'"; ?> />
                    </div>
                    <div id="start-end-time" class="element">
                        <div id="start-time" class="choose-time">
                            <span class="element-title">Thời gian bắt đầu</span>
                            <input type="date" require class="choose-date" class="form-data" id="startDate" name="startDate" value=<?php echo "'" . $start_date . "'"; ?> required>
                            <input type="time" require class="choose-hour" class="form-data" id="startTime" name="startTime" value=<?php echo "'" . $start_time . "'"; ?> required>
                        </div><div id="end-time" class="choose-time">
                            <span class="element-title">Thời gian kết thúc</span>
                            <input type="date" require class="choose-date" class="form-data" id="endDate" name="endDate" value=<?php echo "'" . $end_date . "'"; ?> required>
                            <input type="time" require class="choose-hour" class="form-data" id="endTime" name="endTime" value=<?php echo "'" . $end_time . "'"; ?> required>
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
                        <?php
                            $num = 0;
                            $targetDir = "public/res/img/events/";
                            foreach ($images as $image) {
                                echo "<div id='event-image-wrap" . $num . "' class='event-image-wrap'>"
                                    . "<img class='event-img' id = 'output". $num . "' src='" . $targetDir . $image['urlImage'] . "' name='event_images[]' />" 
                                    . "<input type='hidden' name='event_images[]' value='" . $image['urlImage'] . "' />"
                                    . "<span><img src='public/res/img/admin/remove.png' id='remove" . $num . "' onclick='removeImage(". $num .")' /></span>"
                                    . "</div>";
                                    $num;
                            }
                        ?>
                    </div>
                    <div class="element" id="add-event-btn">
                        <input type="submit" value="Lưu thay đổi" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
        <!-- <script src="public/js/add_event.js"></script> -->
        <script type="text/javascript">
            // const eventImageWraps = document.getElementsByClassName('event-image-wrap');
            let eventImage = document.getElementById('event-image');
            let eventImgs = document.getElementsByClassName('event-img');
            let numOfEventImgs = eventImgs.length;
            let numCheck = numOfEventImgs;

            let loadFile = function(event) {
                let numberOfImages = event.target.files.length;
                numOfEventImgs += numberOfImages;
                numCheck += numberOfImages;
                console.log(event.target.files.length);
                for (let index = 0; index < event.target.files.length; index++) {
                    const element = event.target.files[index];
                    let newIndex = index + numOfEventImgs;

                    let newDiv = document.createElement('div');
                    newDiv.className = 'event-image-wrap';
                    newDiv.setAttribute('id', 'event-image-wrap' + newIndex);
                    let newImageOutput = document.createElement('img');
                    newImageOutput.className = 'event-img';
                    newImageOutput.setAttribute('id', 'output'+ newIndex);
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
                    newRemoveImg.setAttribute('id', 'remove'+ newIndex);
                    newRemoveImg.onclick = function () {
                        document.getElementById('event-image-wrap'+newIndex).remove();
                        numCheck--;
                    }
                    newRemoveSpan.appendChild(newRemoveImg);
                    newDiv.appendChild(newRemoveSpan);

                    eventImage.appendChild(newDiv);
                }
            };

            function removeImage(index) {
                document.getElementById('event-image-wrap' + index).remove();
                numCheck--;
                console.log(numOfEventImgs);
            }

            function checkNumOfImages(event) {
                if (numCheck == 0) {
                    event.preventDefault();
                    alert("Sự kiện này chưa có ảnh!");
                    return false;
                }
                else return true;
            }
        </script>
    </body>
</html>