<?php
    require_once "src/config/connection.php";

    function cadastrar($name, $email, $password) {
        if(userExists($email)) throw new Exception("User já existe");

        $pass = md5($password);
        $query = "INSERT INTO change_user(name, email, pass) VALUES ('${name}', '${email}', '${pass}')";
        $res = insert($query);

        if(isset($res)){
            header('Location: login');
        }
    }

    function userExists($email){
        return false;
    }
