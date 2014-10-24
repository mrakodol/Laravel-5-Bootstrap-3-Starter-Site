<?php
$router->pattern('id', '[0-9]+');
$router->get('news/{id}/item', 'App\Http\Controllers\NewsController@item');
$router->get('video/{id}/item', 'App\Http\Controllers\VideoController@item');
$router->get('photo/{id}/item', 'App\Http\Controllers\PhotoController@item');
$router->resource('', 'App\Http\Controllers\HomeController');