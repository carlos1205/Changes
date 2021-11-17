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
            $db = Repository::getInstance();
            $res = $db -> execute($query);
            $count = $res -> fetchAll();

            if(sizeof($count) === 1){
                $_SESSION["login"] = 'true';
                $_SESSION["user_id"] = $count[0]['id'];
                header('Location: home');
            }else{
                throw new Exception("Email ou senha está errado!");
            }
        }
    }