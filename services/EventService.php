<?php

require_once ROOT . DS . 'services' . DS . 'Service.php';
require_once ROOT . DS . 'app' . DS . 'models' . DS . 'Event.php';

class EventService extends Service{

    public function getAll() {
        $query = "select * from event";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function getOnce($eventID) {
        $query = "select * from event where eventID = " . $eventID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return mysqli_fetch_assoc($result);
    }

    public function getLastID() {
        $query = "select eventID 
                    from event 
                    order by eventID desc 
                    limit 1" . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }

    public function update($event){
        $query = "update event set " 
                    . "name = " . "'" . $event->getName() . "', " 
                    . "timeStart = " . "'" . $event->getTimeStart() . "', " 
                    . "timeEnd = " . "'" . $event->getTimeEnd() . "' " 
                    . "where eventID = " . $event->getEventID();
        parent::setQuery($query);
        parent::updateQuery();

        // $query = "delete from eventimage where eventID = " . $event->getEventID();
        // parent::setQuery($query);
        // parent::deleteQuery();

        // $images = $event->getImages();
        // $images_length = count($images);

        // for ($i=0; $i < $images_length; $i++) { 
        //     $query = "insert into eventimage 
        //                 values ( " . "'" . $event->getEventID() . "', " . "'" . $images[$i] . "');";
        //     parent::setQuery($query);
        //     parent::insertQuery(); 
        // }
    }

    public function insert($event)
    {
        $query = "insert into event (`name`, `timeStart`, `timeEnd`)  values (" . 
                    "'" . $event->getName() . "', " . 
                    "'" . $event->getTimeStart() . "', " . 
                    "'" . $event->getTimeEnd() . "');";
        parent::setQuery($query);
        parent::insertQuery();

        $eventID = self::getLastID();
        $eventID = $eventID->fetch_assoc();
        $eventID = $eventID["eventID"];
        
        $event->setEventID($eventID);
        
        $images = $event->getImages();
        foreach ($images as $image) { 
            $query = "insert into eventimage (`eventID`, `urlImage`) values ( " 
                    . $eventID . ", " . 
                    "'" . $image . "');";
            parent::setQuery($query);
            parent::insertQuery(); 
        }
    }

    public function delete($eventID) {
        $query = "delete from eventimage where eventID = " . $eventID . ";";
        parent::setQuery($query);
        parent::deleteQuery();

        $query = "delete from event where eventID = " . $eventID . ";";
        parent::setQuery($query);
        parent::deleteQuery();
    }

    public function getAllImages($eventID) {
        $query = "select urlImage from eventimage where eventID = " . $eventID . ";";
        parent::setQuery($query);
        $result = parent::executeQuery();
        return $result;
    }
}