<?php
    require_once('src/service/login.service.php');

    if($_POST['username'] === "" || $_POST['password'] === ""){
        echo "user don't exist!";
    }else{
        $user = $_POST['username'];
        $pass = $_POST['password'];
    
        $login = new Login($user, $pass);
        $login -> logar();
    }