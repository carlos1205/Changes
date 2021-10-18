<?php

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'account';
        require_once('views.php');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('src/action/cadastro.action.php');
    }