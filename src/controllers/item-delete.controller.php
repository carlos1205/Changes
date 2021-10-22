<?php
    require_once("src/middlewares/access.middleware.php");
    isLogged();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($rota[1]) && !empty($rota[1]))){
        require_once('src/service/item.service.php');
        try{
            deleteItem($rota[1]);
        }catch(Exception $e){
            $arr = array($ex -> getMessage());
            $_SESSION['error_message'] = $arr;
        }
    }