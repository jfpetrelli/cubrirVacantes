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

        try{
            $conn = $this->connection;
            $sql = " INSERT into users(user_id, password, name, admin,  surname, document_type, document_number, date_of_birth, city, state, address, email, appart, floor) values
            (?, ?, ?, false, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("sssssssssssss"
                                , $user_id
                                , $password
                                , $name
                                , $surname
                                , $document_type
                                , $document_number
                                , $date_of_birth
                                , $city
                                , $state
                                , $address
                                , $email
                                , $appart
                                , $floor);
            
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }

        }catch (\Throwable $th) {
            return 'error';
        }

    }

    public function updateMail($user_id, $email){

        try{
            $conn = $this->connection;
            $sql = "UPDATE users SET email = ? WHERE user_id = ? ";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ss"
                                , $email
                                , $user_id);
            
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }

        }catch (\Throwable $th) {
            return 'error';
        }

    }


    public function signin($user_id, $password){

        $conn = $this->connection;
        $sql = "SELECT admin FROM users where user_id = ? and password = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $user_id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;   
    }


    public function all($user_id){

        $conn = $this->connection;
        $sql = "SELECT name, surname, document_type, document_number, email, address, floor, appart, state, city, date_of_birth FROM users where user_id = ? ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;   
    }

    public function allUsers(){

        $conn = $this->connection;
        $sql = "SELECT distinct user_id, surname,name, concat(document_type,' ', document_number) as document, date_of_birth as date, city, state,address, TRIM(concat(address, ' ',appart, ' ',floor)) as address,
        case when admin = 1 THEN 'Administrador'
            when admin = 2 THEN 'Profesor' 
            else 'Usuario' END as type FROM users
        ";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;   
    }

}


?>