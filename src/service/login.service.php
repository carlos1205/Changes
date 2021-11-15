<?php
    class Login {
        private $email;
        private $password;

        function __construct($email, $password){
            $this -> email = $email;
            $this -> password = $password;
        }

        function logar(){
            $query = "SELECT id FROM change_user WHERE email = '". $this -> email ."' AND pass = '". $this -> password ."'";
            $res = Connection::find($query);

            if($res -> num_rows === 1){
                $row = $res -> fetch_assoc();
                $_SESSION["login"] = 'true';
                $_SESSION["user_id"] = $row['id'];
                header('Location: home');
            }else{
                throw new Exception("Email ou senha está errado!");
            }
        }
    }