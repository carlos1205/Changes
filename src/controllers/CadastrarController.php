<?php
class CadastrarController{
    use ViewTrait;

    public function getIndex(){
        $this->view('cadastrar');
    }

    public function postIndex(){
        $cadastro = new CadastrarAction($_POST['username'], $_POST['email'], $_POST['confirmEmail'], $_POST['password'], $_POST['confirmPassword']);
        $cadastro -> cadastrar();
    }
}