<?php
    require_once("src/middlewares/access.middleware.php");
    isLogged();

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        require_once('src/action/logout.action.php');
    }
