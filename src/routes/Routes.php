<?php
    use Pecee\SimpleRouter\SimpleRouter as Router;

    Router::group(['middleware' => Auth::class], function(){
        Router::get('/', 'HomeController@index');
        Router::get('/home', 'HomeController@index');

        Router::group(['prefix' => 'item'], function(){
            Router::get('/','ItemController@getIndex');
            Router::get('/create', 'ItemController@getCreate');
            Router::get('/{id}/edit', 'ItemController@edit');
        });

        Router::get('/my-itens', 'ItemController@getMyItens');
        Router::get('/logout', 'LoginController@logout');
    });

    Router::controller('/login', LoginController::class);
    Router::controller('/cadastrar', CadastrarController::class);