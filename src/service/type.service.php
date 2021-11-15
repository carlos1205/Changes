<?php

    class TypeService{
        public static function getTypes(){
            $query = "SELECT id,name FROM change_type";
            return Connection::find($query);
        }
    }