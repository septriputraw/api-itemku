<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('/item','ItemController@create');
$router->get('/item', 'ItemController@index');
$router->get('/item/{id}','ItemController@show');
$router->put('/item/{id}', 'ItemController@update');
$router->delete('/item/{id}', 'ItemController@destroy');

// route type
$router->get('/type', 'TypeController@index');
$router->post('/type', 'TypeController@create');
$router->get('type/{id}', 'TypeController@show');
$router->put('/type/{id}', 'TypeController@update');
$router->delete('/type/{id}', 'TypeController@delete');

// route trx
$router->get('/transaction', 'TransactionController@index');
$router->post('/transaction', 'TransactionController@create');
$router->delete('/transaction/{id}', 'TransactionController@delete');

// router report
$router->get('/report', 'ReportController@index');
$router->get('/report/search', 'ReportController@search');
$router->get('/report/tes', 'ReportController@tes');
