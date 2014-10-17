<?php
$router->group(['middleware' => 'auth'], function() {
    $this->resource('admin', 'App\Http\Controllers\Admin\DashboardController');
    $this->resource('admin\blog', 'App\Http\Controllers\Admin\BlogController');
    $this->resource('admin\gallery', 'App\Http\Controllers\Admin\GalleryController');
});
