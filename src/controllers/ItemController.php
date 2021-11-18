<?php
class ItemController{
    use ViewTrait;

    public function getIndex(){
        $this->view('changes', ItemService::getInstance() -> getItens($_SESSION['user_id']));
    }

    public function getMyItens(){
        $this->view('list-itens', ItemService::getInstance() -> getItensWithOwner($_SESSION['user_id']));
    }

    public function edit($id){
        $_SESSION['id_item'] = $id;
        $this->view('edit.item', [ItemService::getInstance() -> getItemWithId($_SESSION['id_item']), TypeService::getInstance() -> getTypes()]);
        unset($_SESSION['id_item']);
    }
    
    public function getCreate(){
        $this->view('form.item', TypeService::getInstance() -> getTypes());
    }

    public function create(){
        $item = new ItemAction(null, $_POST['itemNome'],  $_POST['description'], $_POST['precoItem'], $_FILES['image'], $_POST['type']);
        $item -> insert();
    }

    public function search(){
        $this->view('Search', [$_POST['search'], ItemService::getInstance() -> search($_POST['search'])]);
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