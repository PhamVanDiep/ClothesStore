<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';

    $targetDir = "../../../public/res/img/events/";
    if (isset($_GET)) {
        $eventID = $_GET['eventID'];
        $event_service = new EventService();

        $images = $event_service->getAllImages($eventID);

        foreach ($images as $image) {
            if(file_exists($targetDir . $image['urlImage']))
                unlink($targetDir . $image['urlImage']);
        }

        $event_service->delete($eventID);

        echo "Xóa sự kiện thành công!";
    }