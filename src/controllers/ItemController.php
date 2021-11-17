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

    public function create(){
        $item = new ItemAction(null, $_POST['itemNome'],  $_POST['description'], $_POST['precoItem'], $_FILES['image'], $_POST['type']);
        $item -> insert();
    }

    public function update($id){
        $item = new ItemAction($id, $_POST['itemNome'],  $_POST['description'], $_POST['precoItem'], $_FILES['image'], $_POST['type']);
        $item -> update();
    }

    public function delete($id){
        ItemAction::delete($id);
        $this->view('changes');
    }
}