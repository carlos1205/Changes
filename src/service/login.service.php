<?php
    class Login {
        private $username;
        private $password;

        function __construct($username, $password){
            $this -> username = $username;
            $this -> password = $password;
        }

        function logar(){
            if($this -> username === "carlos" && $this -> password === "123"){
                session_start();
                $_SESSION["login"] = 'true';
                header('Location: home');
            }else{
                header('Location: login');
            }
        }
    }