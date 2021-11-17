<?php
    class Type{
        private $id;
        private $name;

        public function __set($key, $value){
            $this -> $key = $value;
        }

        public function getId(){
            return $this -> id;
        }

        public function getName(){
            return $this -> name;
        }
    }