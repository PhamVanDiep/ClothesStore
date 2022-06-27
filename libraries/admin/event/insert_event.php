<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Event.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';
    require_once ROOT . DS . 'app' . DS . 'controllers' . DS . 'Router.php';

    $targetDir = "../../../public/res/img/events/";
    if (isset($_POST)) {
        $name = $_POST['eventName'];
        $timeStart = $_POST['startDate'] . " " . $_POST['startTime'];
        $timeEnd = $_POST['endDate'] . " " . $_POST['endTime'];

        // images process
        $fileNames = array_filter($_FILES['files']['name']);
        $images_post = $_POST['event_images'];
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            if (in_array($fileName, $images_post)) {
                $targetFilePath = $targetDir . $fileName; 
                move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);
            }
        }

        // insert event
        $event = new Event(0, $name, $timeStart, $timeEnd, $images_post);
        $event_service = new EventService();
        $event_service->insert($event);

        header('Location: ../../../event-management');
    }