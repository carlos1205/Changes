<?php
class ItemController{
    use ViewTrait;

    public function getIndex(){
        $this->view('list-itens');
    }
    
}