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

    function alterar($id, $name, $description, $preco, $image, $type){
        $imgName = $image;
        if(!existsImage($image)){
            $imgName = salvaImagem($image);
        }
        $idUser = $_SESSION['user_id'];
        $query = "UPDATE change_item SET name = ${name}, description = ${description}, price = ${preco}, image = ${imgName}, user_id = ${idUser}, type_id = ${type}) WHERE id = '${id}'";
        $res = insert($query);

        if(isset($res)){
            $_SESSION['success_message'] = array("Item Alterado");
            header('Location: my-itens');
        }
    }

    function salvaImagem($image){
        return salvar($image);
    }

    function getItensWithOwner($id){
        $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type FROM change_item INNER JOIN  change_type  ON  change_item.type_id = change_type.id WHERE user_id = '${id}'";
        return find($query);
    }

    function getItemWithId($id){
        $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}'";
        return find($query);
    }

    function getItens(){
        $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type, change_user.name AS name_user FROM change_item INNER JOIN change_type ON change_item.type_id = change_type.id INNER JOIN  change_user  ON  change_item.user_id = change_user.id";
        return find($query);
    }
    
    function dropImage($image){
        drop($image);
    }

    function existsImage($image){
        return exists($image);
    }

    function deleteItem($id){
        $owner = $_SESSION['user_id'];
        $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}' AND user_id = '${owner}'";
        $item = find($query);
        $item = mysqli_fetch_array($item);
        if(existsImage($item['image'])){
            dropImage($item['image']);
        }

        $query = "DELETE FROM change_item WHERE id = '${id}'";
        delete($query);

        $_SESSION['success_message'] = array("Item Deletado");
        $location = "http://".$_SERVER['SERVER_NAME']."/my-itens";
        header("Location: $location");
    }