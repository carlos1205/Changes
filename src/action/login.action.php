<?php
    class LoginAction{
        public static function logar(){
            session_start();
            if($_POST['email'] === "" || $_POST['password'] === ""){
                $arr = array("Nenhum campo pode ser vazio!"); 
                $_SESSION['error_message'] = $arr;
                header('Location: login');
            }else{
                $email = $_POST['email'];
                $pass = $_POST['password'];
                try{
                    $login = new Login($email, md5($pass));
                    $login -> logar();
                }catch(Exception $e){
                    $arr = array($e -> getMessage()); 
                    $_SESSION['error_message'] = $arr;
                    header('Location: login');
                }
            }
        }

        public static function logout(){
            session_start();
            $_SESSION["login"] = 'false';
            session_destroy();
            header('Location: login');
        }
    }
