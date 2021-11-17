<?php
    class Repository{
        public static $instance;
        
        private $dbConnection;

        private function __construct(){
            $this -> dbConnection = self::connect();
        }

        public static function getInstance(){
            if(!isset(self::$instance))
                self::$instance = new Repository();
            
            return self::$instance;
        }

        private function connect(){
            return new PDO('mysql:host=localhost;dbname=change;', 'root', '');
        }

        public function execute($string){
            $query = $this -> dbConnection -> prepare($string);
            $query -> execute();
            return $query;
        }
    }