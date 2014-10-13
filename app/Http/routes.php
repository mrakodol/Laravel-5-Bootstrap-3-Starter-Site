<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//:: User Account Routes ::
get('user/login', 'Auth\AuthController@showLoginForm');
post('user/login', 'Auth\AuthController@postLogin');

get('user/register', 'Auth\AuthController@showRegistrationForm');
post('user/register', 'Auth\AuthController@register');

post('user/logout', 'Auth\AuthController@logout');


get('/', 'Auth\AuthController@showLoginForm');
