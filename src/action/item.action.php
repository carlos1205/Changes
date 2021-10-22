<?php
    require_once('src/service/item.service.php');

    $name = $_POST['itemNome'];
    $description = $_POST['description'];
    $preco = $_POST['precoItem'];
    $imagem = $_FILES['image'];
    $type = $_POST['type'];

    if(validaCampos($name, $preco, $imagem)){
        try{
            if(isset($rota[1]) && !empty($rota[1])){
                alterar($rota[1], $name, $description, $preco, $imagem, $type);
            }else{
                cadastrar($name, $description, $preco, $imagem, $type);
            }
        }catch(Exception $ex){
            $arr = array($ex -> getMessage());
            $_SESSION['error_message'] = $arr;
        }
    }else{
        if(isset($rota[1]) && !empty($rota[1])){
            $url = $rota[1];
            header("Location: item/$url");
        }else{
            header('Location: item');
        }
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

