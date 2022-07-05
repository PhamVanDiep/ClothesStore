<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Event.php';

class EventService extends Service{

    public function getAll()
    {
        // $query = "select event.*, eventimage.* 
        //             from event, eventimage 
        //             where event.eventID = eventimage.eventID;";
        $query = "select * from event";
        parent::setQuery($query);
        $result = parent::executeQuery();
        // return json_encode($result);
        return $result;
    }

    public function getOnce($eventID)
    {
        $query = "select * from event where eventID = " . $eventID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function update($event){
        $query = "update event
                    set " . 
                    "name = " . "'" . $event->getName() . "', " . 
                    "timeStart = " . "'" . $event->getTimeStart() . "', " . 
                    "timeEnd = " . "'" . $event->getTimeEnd() . "' " . 
                    "where eventID = " . $event->getEventID();
        parent::setQuery($query);
        parent::updateQuery();

        $query = "delete from eventimage where eventID = " . $event->getEventID();
        parent::setQuery($query);
        parent::deleteQuery();

        $images = $event->getImages();
        $images_length = count($images);

        for ($i=0; $i < $images_length; $i++) { 
            $query = "insert into eventimage 
                        values ( " . "'" . $event->getEventID() . "', " . "'" . $images[$i] . "');";
            parent::setQuery($query);
            parent::insertQuery(); 
        }
    }

    public function insert($event)
    {
        $query = "insert into event (`name`, `timeStart`, `timeEnd`)  values (" . 
                    "'" . $event->getName() . "', " . 
                    "'" . $event->getTimeStart() . "', " . 
                    "'" . $event->getTimeEnd() . "');";
        parent::setQuery($query);
        parent::insertQuery();

        // $query = "SELECT eventID FROM event ORDER BY eventID DESC LIMIT 1;";
        // parent::setQuery($query);
        // $eventID = parent::executeQuery();

        // $event->setEventID($eventID);
        
        // $images = $event->getImages();
        // $images_length = count($images);

        // for ($i=0; $i < $images_length; $i++) { 
        //     $query = "insert into eventimage 
        //                 values ( " . "'" . $eventID . "', " . "'" . $images[$i] . "');";
        //     parent::setQuery($query);
        //     parent::insertQuery(); 
        // }
    }

    public function delete($eventID) {
        $query = "delete from eventimage where eventID = " . $eventID . ";";
        parent::setQuery($query);
        parent::deleteQuery();

        $query = "delete from event where eventID = " . $eventID . ";";
        parent::setQuery($query);
        parent::deleteQuery();
    }
}