<?php
class HomeController{
    use ViewTrait;

    public function index(){
        $this->view('home');
    }
}