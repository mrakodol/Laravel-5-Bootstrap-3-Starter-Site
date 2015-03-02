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

Route::get('/', 'PagesController@home');
Route::get('home', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route:resource('articles', 'ArticlesController');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}/item', 'NewsController@item');
Route::get('video/{id}/item', 'VideoController@item');
Route::get('photo/{id}/item', 'PhotoController@item');

//Route::get('auth/login', 'Auth\AuthController@showLoginForm');
//Route::post('auth/login', 'Auth\AuthController@login');
//Route::get('auth/register', 'Auth\AuthController@showRegistrationForm');
//Route::post('auth/register', 'Auth\AuthController@register');
//Route::get('auth/logout', 'Auth\AuthController@logout');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

if (Request::is('admin/*'))
{
    require __DIR__.'/admin_routes.php';
}
