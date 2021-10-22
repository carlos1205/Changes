<?php
    require_once "src/config/imagens.php";
    require_once "src/config/connection.php";

    function cadastrar($name, $description, $preco, $image, $type){
        $imgName = salvaImagem($image);
        $idUser = $_SESSION['user_id'];
        $query = "INSERT INTO change_item(name, description, price, image, user_id, type_id) VALUES ('${name}', '${description}', '${preco}', '${imgName}', '${idUser}', '${type}')";
        $res = insert($query);

        if(isset($res)){
            $_SESSION['success_message'] = array("Item Cadastrado");
            header('Location: item');
        }
    }

    function salvaImagem($image){
        return salvar($image);
    }

    function getItensWithId($id){
        $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type FROM change_item INNER JOIN  change_type  ON  change_item.type_id = change_type.id WHERE user_id = '${id}'";
        return find($query);
    }

    