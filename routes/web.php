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

$router->post('register', 'AuthController@register');
$router->post('auth/login', ['uses' => 'AuthController@authenticate']);

$router->group(
    ['middleware' => ['jwt.auth', 'cors'], 'prefix' => 'api/v1'],
    function() use ($router) {
        $router->get('question', 'Question_studentController@index');
        $router->post('answer', 'Webuser_studentController@store');
        $router->get('result', 'Webuser_studentController@show');
        $router->get('profile', 'Kd_virtuesController@index');
    }
);

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });