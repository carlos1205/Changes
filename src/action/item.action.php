<?php
    require_once('src/service/item.service.php');

    $name = $_POST['itemNome'];
    $description = $_POST['description'];
    $preco = $_POST['precoItem'];
    $imagem = $_FILES['image'];
    $type = $_POST['type'];

    if(validaCampos($name, $preco, $imagem)){
        try{
            cadastrar($name, $description, $preco, $imagem, $type);
        }catch(Exception $e){
            $arr = array($ex -> getMessage());
            $_SESSION['error_message'] = $arr;
        }
    }else{
        header('Location: item');
    }

    function validaCampos($name, $preco, $imagem){
        $bool = true;
        $arr = array();

        if((strlen($name) < 3)){
            $bool = false;
            array_push($arr, "O Nome deve ter mais de 3 caracteres");
        }
        
        if(!($preco > 0.01)){
            $bool = false;
            array_push($arr, "O preço é obrigatório");
        }

        if(empty($imagem) || !isset($imagem)){
            $bool = false;
            array_push($arr, "falta a imagem");
        }

        $_SESSION['error_message'] = $arr;
        return $bool;
    }

