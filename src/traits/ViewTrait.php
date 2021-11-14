<?php
    trait ViewTrait{
        public function view($nome){
            return require("src/view/${nome}.view.php");
        }
    }