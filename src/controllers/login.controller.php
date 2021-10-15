<?php

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'login';
        require_once('views.php');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('src/action/login.action.php');
    }
