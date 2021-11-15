<?php
class ItemController{
    use ViewTrait;

    public function getIndex(){
        $this->view('changes');
    }

    public function getMyItens(){
        $this->view('list-itens');
    }

    public function edit($id){
        $_SESSION['id_item'] = $id;
        $this->view('edit.item');
    }
    
    public function getCreate(){
        $this->view('form.item');
    }
}