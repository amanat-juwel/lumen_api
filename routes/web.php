<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api','middleware' => ['cors']], function() use($router){
	$router->get('/product', 'ProductController@index');
	$router->post('/product', 'ProductController@create');
	$router->get('/product/{id}', 'ProductController@show');
	$router->put('/product/{id}', 'ProductController@update');
	$router->delete('/product/{id}', 'ProductController@destroy');

	$router->post('register', 'UserController@register');
});


$router->post('/login', 'LoginController@login');
//$router->post('/register', 'UserController@register');

$router->post('/register', ['middleware' => ['cors'], 'uses' =>  'UserController@register']);

$router->get('/user', ['middleware' => ['cors','auth'], 'uses' =>  'UserController@get_user']);
