<?php
    
    class Connection{

        private $con;

        public function connect(){

            $dbhost = 'localhost';
            $dbuser = 'c1671526_cs';
            $dbpass = 'POsima22sa';
            $dbname = 'c1671526_cub_vac';
        
            $con=mysqli_connect($dbhost,$dbuser,$dbpass);
            mysqli_select_db($con,$dbname); 
            return $con; 

        }

    }



?>