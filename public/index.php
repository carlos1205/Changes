<?php
    ini_set('default_charset','UTF-8');
    require("vendor/autoload.php");
    use Pecee\SimpleRouter\SimpleRouter as Router;

    require "src/routes/Routes.php";

    Router::start();