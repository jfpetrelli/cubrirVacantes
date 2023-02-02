<?php
    
    class Connection{

        private $con;

        public function connect(){

           $con = new mysqli('localhost', 'root', 'root', 'cubrir_vacantes');
           return $con;

        }

    }



?>