<?php

    class TypeService{
        private static $instance;

        public static function getInstance(){
            if(self::$instance == null) self::$instance = new TypeService();

            return self::$instance;
        }

        private function __construct(){}

        public function getTypes(){
            $query = "SELECT id,name FROM change_type";
            $rep = Repository::getInstance();
            $arr = [];
            $response = $rep -> execute($query);

            while($type = $response -> fetchObject('Type')){
                array_push($arr, $type);
            }
            
            return $arr;
        }
    }