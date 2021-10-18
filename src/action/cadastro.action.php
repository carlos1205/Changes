<?php
    require_once('src/service/cadastrar.service.php');

    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $userPass = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if(validaCampos($userName, $userEmail, $confirmEmail, $userPass, $confirmPassword)){
        try{
            cadastrar($userName, $userEmail, $userPass);
        }catch(Exception $ex){
            echo $ex -> getMessage();
        }
    }else{
        $back = $_SERVER['HTTP_REFERER'];
    }
    
    function validaCampos($userName, $userEmail, $confirmEmail, $userPass, $confirmPassword){
        $bool = true;

        if(!(strlen($userName) > 3)){
            $bool = false;
            trigger_error('O Nome do usuário deve ter mais de 3 caracteres');
        }

        if(!(strlen($userEmail) > 3)){
            $bool = false;
            trigger_error('O email do usuário deve ter mais de 3 caracteres');
        }

        if(!(strcmp($userEmail, $confirmEmail) == 0)){
            $bool = false;
            trigger_error('Os campos de email não conferem');
        }

        if(!(strlen($userPass) > 3)){
            $bool = false;
            trigger_error('A senha deve ter pelo menos 3 caracteres');
        }
        
        if(!(strcmp($userPass, $confirmPassword) == 0)){
            $bool = false;
            trigger_error('Os campos de email não conferem');
        }

        return $bool;
    }