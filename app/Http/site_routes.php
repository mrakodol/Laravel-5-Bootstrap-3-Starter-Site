<?php
$router->pattern('id', '[0-9]+');
$router->get('news/{id}/item', 'App\Http\Controllers\NewsController@item');
$router->resource('', 'App\Http\Controllers\HomeController');