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

        $sql = mysqli_query($this->connection, "SELECT * FROM users_vacants where user = '$user_id' and vacant = '$vacant' and date = current_date() ");

            if(mysqli_num_rows($sql)== 0){
                return 'ok';
            }else{
                return 'error';
            }
            





    }

}


?>