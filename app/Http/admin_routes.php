<?php
$router->group(['middleware' => 'auth'], function() {
    $this->resource('admin/', 'App\Http\Controllers\Admin\DashboardController');
    $this->resource('admin/news/', 'App\Http\Controllers\Admin\NewsController');
    $this->resource('admin/photo/', 'App\Http\Controllers\Admin\PhotoController');
	$this->get('admin/photo/data', 'App\Http\Controllers\Admin\PhotoController@data');
});
