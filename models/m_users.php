<?php

require_once('../models/m_db.php');

class Users{

    private $connection;


    public function __CONSTRUCT(){

        $connect = new Connection();

        $this->connection = $connect->connect();

    }

    public function insert($user_id, $password, $name, $surname, 
    $document_type, $document_number, $date_of_birth, $city, $state, $address, $email, $appart, $floor){

        $sql = $this->connection->query(" INSERT into users(user_id, password, name, surname, admin, document_type, document_number, date_of_birth, city, state, address, email, appart, floor) values
        ('$user_id', '$password', '$name', '$surname', false, 
        '$document_type', '$document_number', '$date_of_birth', '$city', '$state', '$address', '$email', '$appart', '$floor')");

        if($sql == 1){
            return 'ok';
        }else{
            return 'error';
        }


    }


    public function signin($user_id, $password){

        $sql = $this->connection->query("SELECT admin FROM users where user_id = '$user_id' and password = '$password'");

       if($sql == 1){
           return 'ok';
       }else{
           return 'error';
       }


    }

}


?>