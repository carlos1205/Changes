    <?php
        use Pecee\SimpleRouter\SimpleRouter as Router;

        Router::group(['middleware' => Auth::class], function(){
            Router::get('/', 'HomeController@index');
            Router::get('/home', 'HomeController@index');

            Router::group(['prefix' => 'item'], function(){
                Router::get('/','ItemController@getIndex');

                Router::post('/create', 'ItemController@create');
                Router::get('/criar', 'ItemController@getCreate');

                Router::post('/{id}/edit', 'ItemController@update');
                Router::get('/{id}/editar', 'ItemController@edit');

                Router::get('/{id}/deletar', 'ItemController@delete');
            });

            Router::get('/chat', 'ChatController@noChat');
            Router::post('/search', 'ItemController@search');
            Router::get('/my-itens', 'ItemController@getMyItens');
            Router::get('/logout', 'LoginController@logout');
        });

        Router::controller('/login', LoginController::class);
        Router::controller('/cadastrar', CadastrarController::class);