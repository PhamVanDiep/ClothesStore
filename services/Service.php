<?php

require_once ROOT . DS . 'config' . DS . 'config.php';

class Service{
    private $db;
    private $query;

    public function __construct(){
        $this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    // add querry statement
    public function setQuery($query){
        $this->query = $query;
    }

    // use with select statement 
    public function executeQuery(){
        $result = mysqli_query($this->db, $this->query);
        if(!$result){
            echo "FAIL when execute!";
            exit();
        }
        return $result;
    }

    // use with insert statement 
    public function insertQuery(){
        $result = mysqli_query($this->db, $this->query);
        if(!$result){
            echo "FAIL when insert!";
            exit();
        }
    }

    // use with update statement 
    public function updateQuery(){
        $result = mysqli_query($this->db, $this->query);
        if(!$result){
            echo "FAIL when update!";
            exit();
        }
    }

    // use with delete statement 
    public function deleteQuery(){
        $result = mysqli_query($this->db, $this->query);
        if(!$result){
            echo "FAIL when delete!";
            exit();
        }
    }
}