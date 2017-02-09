<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
    'users'     =>  'UsersController',
    'auth'      =>  'Auth\AuthController',
    'password'  =>  'Auth\PasswordController',
]);

Route::get('example', function() {
    $user = 'Pepe';
    return view('examples.template',compact('user'));
});

Route::auth();

Route::get('/home', 'HomeController@index');
