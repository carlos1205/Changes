<?php
    use Pecee\SimpleRouter\SimpleRouter as Router;

    Router::group(['middleware' => Auth::class], function(){
        Router::get('/', 'HomeController@index');
        Router::get('/home', 'HomeController@index');

        Router::controller('/item', ItemController::class);

        Router::get('/logout', 'LoginController@logout');
    });
    
    Router::controller('/login', LoginController::class);
    Router::controller('/cadastrar', CadastrarController::class);