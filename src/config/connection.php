<?php
    class Connection{
        private static function connect(){
            $db = new mysqli('localhost', 'root', '', 'change');
    
            if($db->connect_errno){
                throw new Exception('Erro na conexão');
            }
    
            $db -> set_charset('utf-8');
            return $db;
        }
    
        public static function insert($query){
            $db = Connection::connect();
            $db -> query($query);
            return $db -> insert_id;
        }
    
        public static function find($query){
            $db = Connection::connect();
            return $db -> query($query);
        }
    
        public static function delete($query){
            $db = Connection::connect();
            $db -> query($query);
        }    
    }