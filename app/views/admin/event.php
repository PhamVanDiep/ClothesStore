<?php 
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    global $path_project;
    require_once ROOT . DS . 'services' . DS . 'UserService.php';

    if(!isset($_SESSION['login_id'])){
        header('Location: /web/ClothesStore/logout');
        exit;
    }

    $id = $_SESSION['login_id'];
    $user_service = new UserService();
    $get_user = $user_service->getUserByID($id);

    if($get_user['roleID'] != 2) {
        header('Location: /web/ClothesStore/logout');
        exit;
    }
 ?>
 <!Doctype html>
<html>
    <head>
    <link rel="stylesheet" href="public/css/admin_root.css" />
        <link rel="stylesheet" href="public/css/admin_leftbar.css" />
        <link rel="stylesheet" href="public/css/admin_header.css" />
        <link rel="stylesheet" href="public/css/admin/event.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "public\res\img\logo\online-shopping.png" type = "image/x-icon">
        <title>Danh sách sự kiện</title>
    </head>
    <body>
    <div class="col-10" id="head-bar">
            <?php 
                $title = "Sự kiện";
                $subtitle = "Danh sách sự kiện";
                require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_header.php';
            ?>
        </div>
        <?php 
            require_once ROOT . DS . 'app' . DS . 'views' . DS . 'components' . DS . 'admin_leftbar.php';
        ?>
        <div id="content" class="col-10">
            <div id="body">
                <table>
                    <thead> 
                        <tr>
                            <td>ID</td>
                            <td>Tên sự kiện</td>
                            <!-- <td>Đối tượng</td> -->
                            <td>Bắt đầu</td>
                            <td>Kết thúc</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $eventService = new EventService();
                            $events = $eventService->getAll();
                            foreach($events as $event) {
                                $eventID = $event["eventID"];
                                echo "<tr id='row_" .  $eventID . "' >" 
                                        . "<td>#" . $eventID . "</td>"
                                        . "<td>" . $event["name"] . "</td>"
                                        . "<td>" . $event["timeStart"] . "</td>"
                                        . "<td>" . $event["timeEnd"] . "</td>"
                                        . "<td><a href='/$path_project/edit-event?eventID=$eventID'><img src='public/res/img/admin/edit.png' class='edit-button crud'></a></td>"
                                        . "<td><img src='public/res/img/admin/delete.png' class='delete-button crud' onclick=deleteEvent(" . $eventID .") ></td>"
                                    . "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        function deleteEvent(eventID) {
            let option = confirm('Bạn có chắc chắn muốn xoá sự kiện này không?');
            if(!option) return;
            let table = document.getElementsByTagName('table');
            let row = document.getElementById('row_' + eventID);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "success") {
                        alert("Xóa sự kiện thành công!");
                        row.style.display = "none";
                    } else {
                        alert("Không thể xóa sự kiện này!");
                    }
                }
            };
            xhttp.open("GET", "libraries/admin/event/delete_event.php?eventID=" + eventID, false);
            xhttp.send();
        }
    </script>
</html>