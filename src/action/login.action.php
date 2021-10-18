<?php
    require_once('src/service/login.service.php');

    if($_POST['email'] === "" || $_POST['password'] === ""){
        echo "user don't exist!";
    }else{
        $email = $_POST['email'];
        $pass = $_POST['password'];
        try{
            $login = new Login($email, md5($pass));
            $login -> logar();
        }catch(Exception $e){
            echo $e -> getMessage();
        }
        
    }