<?php
    require_once "src/config/imagens.php";
    class ItemService{
        public static function insert($name, $description, $preco, $image, $type){
            $imgName = salvaImagem($image);
            $idUser = $_SESSION['user_id'];
            $query = "INSERT INTO change_item(name, description, price, image, user_id, type_id) VALUES ('${name}', '${description}', '${preco}', '${imgName}', '${idUser}', '${type}')";
            $res = Connection::insert($query);
    
            if(isset($res)){
                $_SESSION['success_message'] = array("Item Cadastrado");
                header('Location: item');
            }
        }
    
        public static function alterar($id, $name, $description, $preco, $image, $type){
            $imgName = $image;
            if(!existsImage($image)){
                $imgName = salvaImagem($image);
            }
            $idUser = $_SESSION['user_id'];
            $query = "UPDATE change_item SET name = ${name}, description = ${description}, price = ${preco}, image = ${imgName}, user_id = ${idUser}, type_id = ${type}) WHERE id = '${id}'";
            $res = Connection::insert($query);
    
            if(isset($res)){
                $_SESSION['success_message'] = array("Item Alterado");
                header('Location: my-itens');
            }
        }
    
        public static function salvaImagem($image){
            return salvar($image);
        }
    
        public static function getItensWithOwner($id){
            $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type FROM change_item INNER JOIN  change_type  ON  change_item.type_id = change_type.id WHERE user_id = '${id}'";
            return Connection::find($query);
        }
    
        public static function getItemWithId($id){
            $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}'";
            return Connection::find($query);
        }
    
        public static function getItens(){
            $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type, change_user.name AS name_user FROM change_item INNER JOIN change_type ON change_item.type_id = change_type.id INNER JOIN  change_user  ON  change_item.user_id = change_user.id";
            return Connection::find($query);
        }
        
        public static function dropImage($image){
            drop($image);
        }
    
        public static function existsImage($image){
            return exists($image);
        }
    
        public static function deleteItem($id){
            $owner = $_SESSION['user_id'];
            $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}' AND user_id = '${owner}'";
            $item = Connection::find($query);
            $item = mysqli_fetch_array($item);
            if(existsImage($item['image'])){
                dropImage($item['image']);
            }
    
            $query = "DELETE FROM change_item WHERE id = '${id}'";
            Connection::delete($query);
    
            $_SESSION['success_message'] = array("Item Deletado");
            $location = "http://".$_SERVER['SERVER_NAME']."/my-itens";
            header("Location: $location");
        }
    }