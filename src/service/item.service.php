<?php
    require_once "src/config/imagens.php";
    require_once "src/config/connection.php";

    function cadastrar($name, $description, $preco, $image, $type){
        $imgName = salvaImagem($image);
        $idUser = $_SESSION['user_id'];
        $query = "INSERT INTO change_item(name, description, price, image, user_id, type_id) VALUES ('${name}', '${description}', '${preco}', '${image}', '${idUser}', '${type}')";
        $res = insert($query);

        if(isset($res)){
            $_SESSION['success_message'] = array("Item Cadastrado");
            header('Location: item');
        }
    }

    function salvaImagem($image){
        return salvar($image);
    }