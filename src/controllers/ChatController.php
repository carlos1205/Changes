<?php
    class ChatController{
        use ViewTrait;

        public function noChat(){
            $this -> view("404");
        }
    }