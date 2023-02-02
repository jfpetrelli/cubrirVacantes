<?php

require_once('../models/m_db.php');

class UsersVacants{

    private $connection;


    public function __CONSTRUCT(){

        $connect = new Connection();

        $this->connection = $connect->connect();

    }

    public function insert($user_id, $vacant, $cvName){

        try {
            $sql = $this->connection->query("INSERT INTO users_vacants (user, vacant, date, cvFile) VALUES ('$user_id','$vacant', current_date() ,'$cvName') ");

            return 'ok';
        } catch (\Throwable $th) {
            return 'error';
        }


    }

    public function isexist($user_id, $vacant){

        $sql = mysqli_query($this->connection, "SELECT * FROM users_vacants where user = '$user_id' and vacant = '$vacant' ");

            if(mysqli_num_rows($sql)== 0){
                return 'ok';
            }else{
                return 'error';
            }

    }

    public function inscriptions($user_id){

        $sql = mysqli_query($this->connection, "select from_date, to_date, place from users_vacants uv inner join vacants v on uv.vacant = v.id where user = '$user_id' ");

        return $sql;

    }


    public function getScore($vacant){

        $sql = mysqli_query($this->connection, "SELECT u.user_id, uv.date, surname, name, uv.score FROM users_vacants uv
        inner join vacants v on uv.vacant = v.id
        inner join users u on uv.user = u.user_id where v.end_vacant = 0 and uv.vacant = $vacant");

        return $sql;

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



}


?>