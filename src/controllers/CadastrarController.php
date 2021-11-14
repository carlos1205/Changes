<?php
class CadastrarController{
    use ViewTrait;

    public function getIndex(){
        $this->view('cadastrar');
    }

    public function postIndex(){
        $this->view('login');
    }
}