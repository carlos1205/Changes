<?php
    require_once('src/service/cadastrar.service.php');

    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];
    $userPass = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    session_start();

    if(validaCampos($userName, $userEmail, $confirmEmail, $userPass, $confirmPassword)){
        try{
            cadastrar($userName, $userEmail, $userPass);
        }catch(Exception $ex){
            $arr = array($ex -> getMessage());
            $_SESSION['error_message'] = $arr;
        }
    }else{
        header('Location: cadastrar');
    }
    
    function validaCampos($userName, $userEmail, $confirmEmail, $userPass, $confirmPassword){
        $bool = true;
        $arr = array();

        if(!(strlen($userName) > 3)){
            $bool = false;
            array_push($arr, "O Nome do usuário deve ter mais de 3 caracteres");
        }

        if(!(strlen($userEmail) > 3)){
            $bool = false;
            array_push($arr, 'O email do usuário deve ter mais de 3 caracteres');
        }

        if(!(strcmp($userEmail, $confirmEmail) == 0)){
            $bool = false;
            array_push($arr, "Os campos de email não conferem");
        }

        if(!(strlen($userPass) > 3)){
            $bool = false;
            array_push($arr, 'A senha deve ter pelo menos 3 caracteres');
        }
        
        if(!(strcmp($userPass, $confirmPassword) == 0)){
            $bool = false;
            array_push($arr, 'Os campos de email não conferem');
        }

        $_SESSION['error_message'] = $arr;
        return $bool;
    }