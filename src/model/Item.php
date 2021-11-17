<?php
    class Item{
        private $id;
        private $name;
        private $description;
        private $price;
        private $image;
        private $type_id;

        public function __set($key, $value){
            $this -> $key = $value;
        }

        public function __toString(){
            $string = "id: $this -> id <br />";
            $string .= "name: $this -> name <br />";
            $string .= "description: $this -> description <br/>";
            $string .= "price: $this -> price <br />";
            $string .= "image: $this -> image <br />";
            $string .= "type: $this -> type_id <br />";
            return $string;
        }

        public function getId(){
            return $this -> id;
        }

        public function getName(){
            return $this -> name;
        }

        public function getDescription(){
            return $this -> description;
        }

        public function getPrice(){
            return $this -> price;
        }

        public function getImage(){
            return $this -> image;
        }

        public function getType(){
            return $this -> type_id;
        }
    }