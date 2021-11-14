<?php

class LoginController{
    use ViewTrait;

    public function getIndex(){
        $this->view('login');
    }

    public function postIndex(){
        LoginAction::logar();
    }

    public function logout(){
        LoginAction::logout();
    }
}