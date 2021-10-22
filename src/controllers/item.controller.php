<?php
    require_once("src/middlewares/access.middleware.php");
    isLogged();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'form.item';
        require_once('views.php');
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('src/action/item.action.php');
    }