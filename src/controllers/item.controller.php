<?php
    require_once("src/middlewares/access.middleware.php");
    isLogged();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'form.item';
        if(isset($rota[1]) && !empty($rota[1])){
            $_SESSION['id_item'] = $rota[1];
            $page = "edit.item";
        }
        require_once('views.php');
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('src/action/item.action.php');
    }