<?php
    require_once "src/config/connection.php";

    function getTypes(){
        $query = "SELECT id,name FROM change_type";
        return find($query);
    }