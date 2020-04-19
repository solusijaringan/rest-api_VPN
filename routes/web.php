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

$router->get('/hello', function () {
    return "<h1>Liyando</h1><p>Selamat Datang di Lumen Awal</p>";
});
//login
$router->get("login", "LoginController@index");

//kota
$router->get("kota", "KotaController@index");
$router->post("kota/insert", "KotaController@store");
$router->patch("kota/update", "KotaController@update");
$router->delete("kota/{id}", "KotaController@destroy");

$router->get("ads", "AdsController@index");
