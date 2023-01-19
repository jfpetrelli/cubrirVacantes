<?php
    
    class Connection{

        private $con;

        public function connect(){

           $con = new mysqli('localhost', 'root', 'root', 'cubrir_vacantes');
           return $con;

        }
/*
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

*/
    }



?>