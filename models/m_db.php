<?php
    
    class Connection{

        private $con;

        public function connect(){

            include("../config/config.php");
            $con=mysqli_connect($dbhost,$dbuser,$dbpass);
            mysqli_select_db($con,$dbname); 
            return $con; 

        }

    }



?>