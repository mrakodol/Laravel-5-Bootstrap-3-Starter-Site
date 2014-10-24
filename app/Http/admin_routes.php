<?php
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    $this->pattern('id', '[0-9]+');
    $this->pattern('id2', '[0-9]+');

    #Language
    $this->get('language', 'App\Http\Controllers\Admin\LanguageController@index');
    $this->get('language/create', 'App\Http\Controllers\Admin\LanguageController@getCreate');
    $this->post('language/create', 'App\Http\Controllers\Admin\LanguageController@postCreate');
    $this->get('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@getEdit');
    $this->post('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@postEdit');
    $this->get('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@getDelete');
    $this->post('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@postDelete');
    $this->get('language/data', 'App\Http\Controllers\Admin\LanguageController@data');
    $this->get('language/reorder', 'App\Http\Controllers\Admin\LanguageController@getReorder');

    #News category
    $this->get('newscategory', 'App\Http\Controllers\Admin\NewsCategoryController@index');
    $this->get('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@getCreate');
    $this->post('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@postCreate');
    $this->get('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@getEdit');
    $this->post('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@postEdit');
    $this->get('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@getDelete');
    $this->post('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@postDelete');
    $this->get('newscategory/data', 'App\Http\Controllers\Admin\NewsCategoryController@data');
    $this->get('newscategory/reorder', 'App\Http\Controllers\Admin\NewsCategoryController@getReorder');

    #News
    $this->get('news', 'App\Http\Controllers\Admin\NewsController@index');
    $this->get('news/create', 'App\Http\Controllers\Admin\NewsController@getCreate');
    $this->post('news/create', 'App\Http\Controllers\Admin\NewsController@postCreate');
    $this->get('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@getEdit');
    $this->post('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@postEdit');
    $this->get('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@getDelete');
    $this->post('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@postDelete');
    $this->get('news/data', 'App\Http\Controllers\Admin\NewsController@data');
    $this->get('news/reorder', 'App\Http\Controllers\Admin\NewsController@getReorder');

    #Photo Album
    $this->get('photoalbum', 'App\Http\Controllers\Admin\PhotoAlbumController@index');
    $this->get('photoalbum/create', 'App\Http\Controllers\Admin\PhotoAlbumController@getCreate');
    $this->post('photoalbum/create', 'App\Http\Controllers\Admin\PhotoAlbumController@postCreate');
    $this->get('photoalbum/{id}/edit', 'App\Http\Controllers\Admin\PhotoAlbumController@getEdit');
    $this->post('photoalbum/{id}/edit', 'App\Http\Controllers\Admin\PhotoAlbumController@postEdit');
    $this->get('photoalbum/{id}/delete', 'App\Http\Controllers\Admin\PhotoAlbumController@getDelete');
    $this->post('photoalbum/{id}/delete', 'App\Http\Controllers\Admin\PhotoAlbumController@postDelete');
    $this->get('photoalbum/data', 'App\Http\Controllers\Admin\PhotoAlbumController@data');
    $this->get('photoalbum/reorder', 'App\Http\Controllers\Admin\PhotoAlbumController@getReorder');

    #Photo
    $this->get('photo', 'App\Http\Controllers\Admin\PhotoController@index');
    $this->get('photo/create', 'App\Http\Controllers\Admin\PhotoController@getCreate');
    $this->post('photo/create', 'App\Http\Controllers\Admin\PhotoController@postCreate');
    $this->get('photo/{id}/edit', 'App\Http\Controllers\Admin\PhotoController@getEdit');
    $this->post('photo/{id}/edit', 'App\Http\Controllers\Admin\PhotoController@postEdit');
    $this->get('photo/{id}/delete', 'App\Http\Controllers\Admin\PhotoController@getDelete');
    $this->post('photo/{id}/delete', 'App\Http\Controllers\Admin\PhotoController@postDelete');
    $this->get('photo/{id}/itemsforalbum', 'App\Http\Controllers\Admin\PhotoController@itemsForAlbum');
    $this->get('photo/{id}/{id2}/slider', 'App\Http\Controllers\Admin\PhotoController@getSlider');
    $this->get('photo/{id}/{id2}/albumcover', 'App\Http\Controllers\Admin\PhotoController@getAlbumCover');
    $this->get('photo/data/{id}', 'App\Http\Controllers\Admin\PhotoController@data');
    $this->get('photo/reorder', 'App\Http\Controllers\Admin\PhotoController@getReorder');

    #Video
    $this->get('videoalbum', 'App\Http\Controllers\Admin\VideoAlbumController@index');
    $this->get('videoalbum/create', 'App\Http\Controllers\Admin\VideoAlbumController@getCreate');
    $this->post('videoalbum/create', 'App\Http\Controllers\Admin\VideoAlbumController@postCreate');
    $this->get('videoalbum/{id}/edit', 'App\Http\Controllers\Admin\VideoAlbumController@getEdit');
    $this->post('videoalbum/{id}/edit', 'App\Http\Controllers\Admin\VideoAlbumController@postEdit');
    $this->get('videoalbum/{id}/delete', 'App\Http\Controllers\Admin\VideoAlbumController@getDelete');
    $this->post('videoalbum/{id}/delete', 'App\Http\Controllers\Admin\VideoAlbumController@postDelete');
    $this->get('videoalbum/data', 'App\Http\Controllers\Admin\VideoAlbumController@data');
    $this->get('video/reorder', 'App\Http\Controllers\Admin\VideoAlbumController@getReorder');

    #Video
    $this->get('video', 'App\Http\Controllers\Admin\VideoController@index');
    $this->get('video/create', 'App\Http\Controllers\Admin\VideoController@getCreate');
    $this->post('video/create', 'App\Http\Controllers\Admin\VideoController@postCreate');
    $this->get('video/{id}/edit', 'App\Http\Controllers\Admin\VideoController@getEdit');
    $this->post('video/{id}/edit', 'App\Http\Controllers\Admin\VideoController@postEdit');
    $this->get('video/{id}/delete', 'App\Http\Controllers\Admin\VideoController@getDelete');
    $this->post('video/{id}/delete', 'App\Http\Controllers\Admin\VideoController@postDelete');
    $this->get('video/{id}/itemsforalbum', 'App\Http\Controllers\Admin\VideoController@itemsForAlbum');
    $this->get('video/{id}/{id2}/albumcover', 'App\Http\Controllers\Admin\VideoController@getAlbumCover');
    $this->get('video/data/{id}', 'App\Http\Controllers\Admin\VideoController@data');
    $this->get('video/reorder', 'App\Http\Controllers\Admin\VideoController@getReorder');

    #Users
    $this->get('users/', 'App\Http\Controllers\Admin\UserController@index');
    $this->get('users/create', 'App\Http\Controllers\Admin\UserController@getCreate');
    $this->post('users/create', 'App\Http\Controllers\Admin\UserController@postCreate');
    $this->get('users/{id}/edit', 'App\Http\Controllers\Admin\UserController@getEdit');
    $this->post('users/{id}/edit', 'App\Http\Controllers\Admin\UserController@postEdit');
    $this->get('users/{id}/delete', 'App\Http\Controllers\Admin\UserController@getDelete');
    $this->post('users/{id}/delete', 'App\Http\Controllers\Admin\UserController@postDelete');
    $this->get('users/data', 'App\Http\Controllers\Admin\UserController@data');

    #Roles
    $this->get('roles/', 'App\Http\Controllers\Admin\RoleController@index');
    $this->get('roles/create', 'App\Http\Controllers\Admin\RoleController@getCreate');
    $this->post('roles/create', 'App\Http\Controllers\Admin\RoleController@postCreate');
    $this->get('roles/{id}/edit', 'App\Http\Controllers\Admin\RoleController@getEdit');
    $this->post('roles/{id}/edit', 'App\Http\Controllers\Admin\RoleController@postEdit');
    $this->get('roles/{id}/delete', 'App\Http\Controllers\Admin\RoleController@getDelete');
    $this->post('roles/{id}/delete', 'App\Http\Controllers\Admin\RoleController@postDelete');
    $this->get('roles/data', 'App\Http\Controllers\Admin\RoleController@data');

    #Admin Dashboard
    $this->get('/', 'App\Http\Controllers\Admin\DashboardController@index');

});
