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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1'], function () use ($router) {
        $router->get('movies', ['uses' => 'MovieController@index']);

        $router->post('movies', ['uses' => 'MovieController@create']);

        $router->get('movies/{id}', ['uses' => 'MovieController@showOne']);

        $router->post('rentals', ['uses' => 'RentalController@create']);

        $router->get('clients', ['uses' => 'ClientController@index']);

        $router->get('clients/{id}', ['uses' => 'ClientController@showOne']);

        $router->post('clients', ['uses' => 'ClientController@create']);

        $router->post('clients/{id}/rent_movies', ['uses' => 'ClientController@rentSeveralMovies']);
    });
});
