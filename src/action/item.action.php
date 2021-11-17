<?php
    class ItemAction{
        private $item;

        function __construct($id = null, $name, $description, $price, $image, $type){
            $this -> item = new Item();
            $this -> item -> __set('id', $id);
            $this -> item -> __set('name', $name);
            $this -> item -> __set('description', $description);
            $this -> item -> __set('price', $price);
            $this -> item -> __set('image', $image);
            $this -> item -> __set('type_id', $type);
        }

        public function insert(){
            if($this -> valida()){
                try{
                    ItemService::getInstance() -> insert($this -> item -> getName(), $this -> item -> getDescription(), $this -> item -> getPrice(), $this -> item -> getImage(), $this -> item -> getType());    
                }catch(Exception $e){
                    $arr = array($e -> getMessage());
                    $_SESSION['error_message'] = $arr;
                    header('Location: criar');
                }
            }else{
                header('Location: criar');
            }
        }

        public function update(){
            if($this -> valida()){
                try{
                    ItemService::getInstance() -> alterar($this -> item -> getId(), $this -> item -> getName(), $this -> item -> getDescription(), $this -> item -> getPrice(), $this -> item -> getImage(), $this -> item -> getType());
                }catch(Exception $e){
                    $arr = array($e -> getMessage());
                    $_SESSION['error_message'] = $arr;
                    header("Location: $this -> item -> getId()/editar");
                }
            }else{
                $locale = $this -> item -> getId();
                $location = "http://".$_SERVER['SERVER_NAME']."/item/$locale/editar";
                header("Location: $location");
            }
        }
    
        public static function delete($id){
            try{
                ItemService::getInstance() -> deleteItem($id);
            }catch(Exception $e){
                $arr = array($e -> getMessage());
                $_SESSION['error_message'] = $arr;
                header("Location: $id/editar");
            }
        }

        public function valida(){
            $bool = true;
            $arr = array();

            if((strlen($this -> item -> getName()) < 3)){
                $bool = false;
                array_push($arr, "O Nome deve ter mais de 3 caracteres");
            }
            
            if(!($this -> item -> getPrice() > 0.01)){
                $bool = false;
                array_push($arr, "O preço é obrigatório");
            }

            if($this -> item -> getImage()['error'] === 4 && $this -> item -> getId() === null){
                $bool = false;
                array_push($arr, "A falta a imagem");
            }

            $_SESSION['error_message'] = $arr;
            return $bool;
        }
    }

