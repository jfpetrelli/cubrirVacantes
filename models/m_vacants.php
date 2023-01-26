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

    public function allVacants(){

        $sql = mysqli_query($this->connection, " SELECT id, place FROM cubrir_vacantes.vacants where current_date() < to_date ");

        return $sql;


    }

    public function expirationVacants(){

        $sql = mysqli_query($this->connection, " SELECT from_date, to_date, place, career FROM cubrir_vacantes.vacants where to_date  <= current_date() ");

        return $sql;


    }

}


?>