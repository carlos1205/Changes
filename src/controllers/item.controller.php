<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $page = 'form.item';
        require_once('views.php');
    }