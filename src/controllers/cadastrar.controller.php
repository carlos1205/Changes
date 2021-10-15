<?php

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'account';
        require_once('views.php');
    }