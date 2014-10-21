<?php
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    $this->pattern('id', '[0-9]+');

    #Language
    $this->get('language', 'App\Http\Controllers\Admin\LanguageController@index');
    $this->get('language/create', 'App\Http\Controllers\Admin\LanguageController@getCreate');
    $this->post('language/create', 'App\Http\Controllers\Admin\LanguageController@postCreate');
    $this->get('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@getEdit');
    $this->post('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@postEdit');
    $this->get('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@getDelete');
    $this->post('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@postDelete');
    $this->get('language/data', 'App\Http\Controllers\Admin\LanguageController@data');

    #News category
    $this->get('newscategory', 'App\Http\Controllers\Admin\NewsCategoryController@index');
    $this->get('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@getCreate');
    $this->post('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@postCreate');
    $this->get('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@getEdit');
    $this->post('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@postEdit');
    $this->get('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@getDelete');
    $this->post('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@postDelete');
    $this->get('newscategory/data', 'App\Http\Controllers\Admin\NewsCategoryController@data');

    #News
    $this->get('news', 'App\Http\Controllers\Admin\NewsController@index');
    $this->get('news/create', 'App\Http\Controllers\Admin\NewsController@getCreate');
    $this->post('news/create', 'App\Http\Controllers\Admin\NewsController@postCreate');
    $this->get('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@getEdit');
    $this->post('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@postEdit');
    $this->get('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@getDelete');
    $this->post('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@postDelete');
    $this->get('news/data', 'App\Http\Controllers\Admin\NewsController@data');

    //not finished
	$this->get('admin/photo/data', 'App\Http\Controllers\Admin\PhotoController@data');
    $this->resource('admin/photo/', 'App\Http\Controllers\Admin\PhotoController');

    $this->get('admin/photoalbum/data', 'App\Http\Controllers\Admin\PhotoAlbumController@data');
    $this->resource('admin/photoalbum/', 'App\Http\Controllers\Admin\PhotoAlbumController');

    $this->get('admin/videoalbum/data', 'App\Http\Controllers\Admin\VideoAlbumController@data');
    $this->resource('admin/videoalbum/', 'App\Http\Controllers\Admin\VideoAlbumController');

    $this->get('admin/video/data', 'App\Http\Controllers\Admin\VideoController@data');
    $this->resource('admin/video/', 'App\Http\Controllers\Admin\VideoController');

    $this->get('admin/users/data', 'App\Http\Controllers\Admin\UserController@data');
    $this->resource('admin/users/', 'App\Http\Controllers\Admin\UserController');

    $this->get('admin/roles/data', 'App\Http\Controllers\Admin\RoleController@data');
    $this->resource('admin/roles/', 'App\Http\Controllers\Admin\RoleController');

    $this->get('/', 'App\Http\Controllers\Admin\DashboardController@index');


});
