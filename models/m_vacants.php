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

        try{
            $conn = $this->connection;
            $sql = " INSERT into vacants(place, career, from_date, to_date, detail, path, end_vacant, upload_meritos) values
            (?, ?, ?, ?, ?, ?, 0,0)";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ssssss"
                                , $place
                                , $career
                                , $from_date
                                , $to_date
                                , $detail
                                , $path);
            
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }

        }catch (\Throwable $th) {
            return 'error';
        }


    }

    public function allVacants(){

        $sql = mysqli_query($this->connection, "SELECT id, place, career, from_date, to_date, detail FROM vacants where current_date >= from_date and current_date() <= to_date and end_vacant = 0 ");

        return $sql;  
    }

    public function expirationVacants(){

        $sql = mysqli_query($this->connection, " SELECT id, from_date, to_date, place, career, IF(upload_meritos = 1, 'SI', 'NO') as upload_meritos FROM vacants where to_date  < current_date()");

        return $sql;


    }

    public function expirationVacantsProfe(){

        $sql = mysqli_query($this->connection, " SELECT id, from_date, to_date, place, career FROM vacants where to_date  < current_date() and end_vacant = 0");

        return $sql;


    }

    public function getPath($vacant){

        $conn = $this->connection;
        $sql = "select path, place, career, ifnull(detail,'') as detail from vacants  where id = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $vacant);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    public function allVacantsEnd(){

        $sql = mysqli_query($this->connection, " SELECT id, place, career FROM vacants where upload_meritos = 1 ");

        return $sql;


    }

    public function updateEndVacant($vacant){

        $conn = $this->connection;
            $sql = "UPDATE vacants SET end_vacant = 1 WHERE id = ? ";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s", $vacant);
            $stmt->execute();

    }

    public function uploadMeritos(){

        try{


        $sql = $this->connection->query(" UPDATE vacants SET upload_meritos = 1 where upload_meritos = 0 and end_vacant = 1");

        return 'ok';
        }catch (\Throwable $th) {
            return 'error';
        }

    }


}


?>