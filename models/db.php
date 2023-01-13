<?php
    
    class Conection{

        private $con;

        public function __construct(){

            $this->con = new mysqli('localhost', 'root', 'root', 'cubrir_vacantes');

        }

        public function getUsers(){
            
            $query = $this->con->query('SELECT * FROM users');

            $res = [];
            $i = 0;

            while($row = $query->fetch_assoc()){
                $res[$i] = $row;
                $i++;
            }

            return $res;
        }


    }



?>