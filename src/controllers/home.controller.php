<?php
    require_once("src/middlewares/access.middleware.php");
    isLogged();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'home';
        require_once('views.php');
    }
