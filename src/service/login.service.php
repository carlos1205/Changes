<?php
    require_once "src/config/connection.php";

    class Login {
        private $email;
        private $password;

        function __construct($email, $password){
            $this -> email = $email;
            $this -> password = $password;
        }

        function logar(){
            $query = "SELECT id FROM change_user WHERE email = '".$this -> email."' AND pass = '".$this -> password."'";
            $res = find($query);

            if($res -> num_rows < 0) throw new Exception("Usuário não existe");
            if($res -> num_rows > 1) throw new Exception("Internal Error");
            
            $row = $res -> fetch_assoc();

            session_start();
            $_SESSION["login"] = 'true';
            $_SESSION["user_id"] = $row['id'];
            header('Location: home');
        }
    }