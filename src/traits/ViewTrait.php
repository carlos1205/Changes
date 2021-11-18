<?php
    trait ViewTrait{
        public function view($nome, $data = []){
            foreach($data as $key => $value)
                ${$key} = $value;
                
            return require("src/view/${nome}.view.php");
        }
    }