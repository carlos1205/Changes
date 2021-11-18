<?php
    class ItemService{
        private static $instance;

        public static function getInstance(){
            if(self::$instance === null) $instance = new ItemService();

            return $instance;
        }

        private function __construct(){}

        public function insert($name, $description, $preco, $image, $type){
            $imgName = ImageRepository::salvar($image);

            $idUser = $_SESSION['user_id'];
            $query = "INSERT INTO change_item(name, description, price, image, user_id, type_id) VALUES ('${name}', '${description}', '${preco}', '${imgName}', '${idUser}', '${type}')";
            $res = self::execQuery($query);
    
            if(isset($res)){
                $_SESSION['success_message'] = array("Item Cadastrado");
                header('Location: criar');
            }else{
                $locale = $this -> item -> getId();
                $location = "http://".$_SERVER['SERVER_NAME']."/item/$locale/editar";
                header("Location: $location");
            }
        }
    
        public function alterar($id, $name, $description, $preco, $image, $type){
            $imgName = $image['name'];
            if(!ImageRepository::exists($imgName)){
                $imgAntiga = self::getItemWithId($id) -> getImage();
                ImageRepository::drop($imgAntiga);
                $imgName = ImageRepository::salvar($image);
            }

            $idUser = $_SESSION['user_id'];
            $query = "UPDATE change_item SET name = '${name}', description = '${description}', price = '${preco}', image = '${imgName}', user_id = '${idUser}', type_id = '${type}' WHERE id = '${id}' AND user_id = '${idUser}'";
            $res = self::execQuery($query);
    
            if($res){
                $_SESSION['success_message'] = array("Item Alterado");
                $location = "http://".$_SERVER['SERVER_NAME']."/my-itens";
                header("Location: $location");
            }
        }
    
        public function getItensWithOwner($id){
            $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type FROM change_item INNER JOIN  change_type  ON  change_item.type_id = change_type.id WHERE user_id = '${id}' ORDER BY change_item.id DESC";
            $arr = [];
            $response = self::execQuery($query);

            while($item = $response -> fetchObject('Item')){
                array_push($arr, $item);
            }
            return $arr;
        }
    
        public function getItemWithId($id){
            $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}'";
            $response = self::execQuery($query);
            return $response -> fetchObject('Item');
        }
    
        public function getItens(){
            $query = "SELECT change_item.id, change_item.name, change_item.description, change_item.price, change_item.image, change_type.name AS name_type, change_user.name AS name_user FROM change_item INNER JOIN change_type ON change_item.type_id = change_type.id INNER JOIN  change_user  ON  change_item.user_id = change_user.id ORDER BY change_item.id DESC";
            $arr = [];
            $response = self::execQuery($query);

            while($item = $response -> fetchObject('Item')){
                array_push($arr, $item);
            }
            return $arr;
        }
    
        public function deleteItem($id){
            $owner = $_SESSION['user_id'];
            $query = "SELECT id, name, description, price, image, type_id FROM change_item WHERE id = '${id}' AND user_id = '${owner}'";
            $item = self::execQuery($query);

            $item = $item -> fetchObject('Item');
            if(ImageRepository::exists($item -> getImage())){
                ImageRepository::drop($item -> getImage());
            }
    
            $query = "DELETE FROM change_item WHERE id = '${id}'";
            self::execQuery($query);
    
            $_SESSION['success_message'] = array("Item Deletado");
            $location = "http://".$_SERVER['SERVER_NAME']."/my-itens";
            header("Location: $location");
        }

        public function execQuery($query){
            $db = Repository::getInstance();
            return $db -> execute($query);
        }
    }