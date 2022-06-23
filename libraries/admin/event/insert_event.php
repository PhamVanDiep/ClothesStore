<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'config' . DS . 'config.php';
    require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Event.php';
    require_once ROOT . DS . 'services' . DS . 'EventService.php';

    if (isset($_POST)) {
        $name = $_POST['name'];
        $timeStart = $_POST['timeStart'];
        $timeEnd = $_POST['timeEnd'];
        // $images = $_POST['event_images'];
        $images = '';
        $event = new Event(0, $name, $timeStart, $timeEnd, $images);
        $event_service = new EventService();
        $event_service->insert($event);
        echo INSERT_SUCCESS;
        // echo $event->getName() . " " . $event->getTimeStart() . " " . $event->getTimeEnd();
    }