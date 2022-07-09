<?php

class Event{
    private $eventID;
    private $name;
    private $timeStart;
    private $timeEnd;
    private $images;

    public function __construct($eventID, $name, $timeStart, $timeEnd, $images){
        self::setEventID($eventID);
        self::setName($name);
        self::setTimeStart($timeStart);
        self::setTimeEnd($timeEnd);
        self::setImages($images);
    }

    public function getEventID()
    {
        return $this->eventID;
    }

    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTimeStart()
    {
        return $this->timeStart;
    }

    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }
}