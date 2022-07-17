<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';

    $targetDir = "../../../public/res/img/events/";
    if (isset($_GET)) {
        $eventID = $_GET['eventID'];
        $event_service = new EventService();
        $canDelete = $event_service->checkCanDelete($eventID);

        if ($canDelete == false) {
            echo 'fail';
        } else {
            $images = $event_service->getAllImages($eventID);
            foreach ($images as $image) {
                if(file_exists($targetDir . $image['urlImage']))
                    unlink($targetDir . $image['urlImage']);
            }
            $event_service->delete($eventID);
            echo 'success';
        }
    }