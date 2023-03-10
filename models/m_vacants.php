<?php

require_once('../models/m_db.php');

class Vacants{

    private $connection;


    public function __CONSTRUCT(){

        $connect = new Connection();

        $this->connection = $connect->connect();

    }

    public function insert($place, $career, $from_date, $to_date, 
    $detail, $path){

        $sql = $this->connection->query(" INSERT into vacants(place, career, from_date, to_date, detail, path) values
        ('$place', '$career', '$from_date', '$to_date', '$detail', '$path')");

        if($sql == 1){
            return 'ok';
        }else{
            return 'error';
        }


    }

    public function allVacants(){

        $sql = mysqli_query($this->connection, " SELECT id, place, career, from_date, to_date, detail FROM cubrir_vacantes.vacants where current_date() < to_date and end_vacant = 0 ");

        return $sql;


    }

    public function expirationVacants(){

        $sql = mysqli_query($this->connection, " SELECT id, from_date, to_date, place, career FROM cubrir_vacantes.vacants where to_date  <= current_date() and end_vacant = 0 ");

        return $sql;


    }

    public function getPath($vacant){

        $sql = mysqli_query($this->connection, "select path from vacants  where id = $vacant ");

        return $sql;

    }

}


?>