<?php

    class TypeService{
        public static function getTypes(){
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