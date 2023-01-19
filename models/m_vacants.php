<?php

require_once('../models/m_db.php');

class Vacants{

    private $connection;


    public function __CONSTRUCT(){

        $connect = new Connection();

        $this->connection = $connect->connect();

    }

    public function insert($place, $career, $from_date, $to_date, 
    $detail){

        $sql = $this->connection->query(" INSERT into vacants(place, career, from_date, to_date, detail) values
        ('$place', '$career', '$from_date', '$to_date', '$detail')");

        if($sql == 1){
            return 'ok';
        }else{
            return 'error';
        }


    }

}


?>