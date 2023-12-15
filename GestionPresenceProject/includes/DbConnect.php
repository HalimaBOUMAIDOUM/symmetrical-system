<?php
    class DbConnect {
        private $connection;
        function __construct()
        {
            
        }

        function connect(){
            include_once dirname(__FILE__).'/Constants.php';
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            if(mysqli_connect_errno()){
                echo "Error connecting to DB ".mysqli_connect_error();
            }

            return $this->connection;
        }
    }