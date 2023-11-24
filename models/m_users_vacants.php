<?php

require_once('../models/m_db.php');

class UsersVacants{

    private $connection;


    public function __CONSTRUCT(){

        $connect = new Connection();

        $this->connection = $connect->connect();

    }

    public function insert($user_id, $vacant, $cvName){
        try{
            $conn = $this->connection;
            $sql = "INSERT INTO users_vacants (user,cvFile, vacant, date, score) VALUES (?, ?, ?, current_date(), 0) ";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ssi"
                                , $user_id
                                , $cvName
                                , $vacant);
            
            if($stmt->execute()){
                return 'ok';
            }else{
                echo 'Error: ' . $stmt->error;
                //return 'error';
            }
        
        }catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage();
            //return 'error';
        }

    }

    public function isexist($user_id, $vacant){
    
        $tot = 0;
        $conn = $this->connection;
        $sql = "SELECT count(*) as tot FROM users_vacants where user = ? and vacant = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $user_id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($row = mysqli_fetch_array($result)){
            $tot = $row['tot'];
        }
        if($tot == 0){
            return 'ok';
        }else{
            return 'error';
        }

    }

    public function inscriptions($user_id){

        $conn = $this->connection;
        $sql = "select from_date, to_date, place from users_vacants uv inner join vacants v on uv.vacant = v.id where user = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result;
    }


    public function getScore($vacant){

        $conn = $this->connection;
        $sql = "SELECT u.user_id, uv.date, surname, name, uv.score FROM users_vacants uv
        inner join vacants v on uv.vacant = v.id
        inner join users u on uv.user = u.user_id where v.end_vacant = 0 and uv.vacant = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $vacant);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result;

    }

    public function insertScore($vacant, $users_id, $scores){

        try{

        
        for($i = 0; $i < count($users_id); $i ++){
            
            $score = $scores[$i];
            $user_id = $users_id[$i];
            $sql = $this->connection->query(" UPDATE users_vacants SET score = $score where vacant = $vacant and user = '$user_id' ");
        
        }

        $sql = $this->connection->query(" UPDATE vacants SET end_vacant = 1 where id = $vacant");

        return 'ok';
        }catch (\Throwable $th) {
            return 'error';
        }

    }

    public function getAllScore($vacant){

        $conn = $this->connection;
        $sql = "SELECT u.user_id, uv.date, surname, name, uv.score FROM users_vacants uv
        inner join vacants v on uv.vacant = v.id
        inner join users u on uv.user = u.user_id where v.end_vacant = 1 and uv.vacant = ? order by uv.score desc";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $vacant);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result;


    }



}


?>