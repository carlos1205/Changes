<?php
    function connect(){
        $db = new mysqli('localhost', 'root', '', 'change');

        if($db->connect_errno){
            throw new Exception('Erro na conexão');
        }

        $db -> set_charset('utf-8');
        return $db;
    }

    function insert($query){
        $db = connect();
        $db -> query($query);
        return $db -> insert_id;
    }

    function find($query){
        $db = connect();
        return $db -> query($query);
    }

