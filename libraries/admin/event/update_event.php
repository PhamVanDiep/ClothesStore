<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Event.php';

    $targetDir = "../../../public/res/img/events/";
    if (isset($_POST)) {
        $eventID = $_POST['eventID'];
        $name = $_POST['eventName'];
        $timeStart = $_POST['startDate'] . " " . $_POST['startTime'];
        $timeEnd = $_POST['endDate'] . " " . $_POST['endTime'];

        $event_service = new EventService();
        $images_exist = $event_service->getAllImages($eventID);

        $images_post = '';
        // images process
        $fileNames = array_filter($_FILES['files']['name']);
        $images_post = $_POST['event_images'];
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            if (in_array($fileName, $images_post)) {
                $check = $event_service->checkImageExist($eventID, $fileName);
                if($check['num'] === 0) {
                    $targetFilePath = $targetDir . $fileName; 
                    move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);
                    $event_service->updateImage($eventID, $fileName);
                }
            }
        }

        foreach ($images_exist as $image) {
            if (!in_array($image['urlImage'], $images_post)) {
                unlink($targetDir.$image['urlImage']);
                $event_service->deleteImage($eventID, $image['urlImage']);
            }
        }

        // insert event
        $event = new Event($eventID, $name, $timeStart, $timeEnd, $images_post);
        
        $event_service->update($event);

        header('Location: ../../../event-management');
    }