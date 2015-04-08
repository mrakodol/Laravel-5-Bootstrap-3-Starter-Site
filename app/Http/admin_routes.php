<?php
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');
    
    #Language
    Route::get('language', 'Admin\LanguageController@index');
    Route::get('language/create', 'Admin\LanguageController@getCreate');
    Route::post('language/create', 'Admin\LanguageController@postCreate');
    Route::get('language/{id}/edit', 'Admin\LanguageController@getEdit');
    Route::post('language/{id}/edit', 'Admin\LanguageController@postEdit');
    Route::get('language/{id}/delete', 'Admin\LanguageController@getDelete');
    Route::post('language/{id}/delete', 'Admin\LanguageController@postDelete');
    Route::get('language/data', 'Admin\LanguageController@data');
    Route::get('language/reorder', 'Admin\LanguageController@getReorder');

    #News category
    Route::get('newscategory', 'Admin\ArticleCategoriesController@index');
    Route::get('newscategory/create', 'Admin\ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'Admin\ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'Admin\ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'Admin\ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'Admin\ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'Admin\ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'Admin\ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'Admin\ArticleCategoriesController@getReorder');

    #News
    Route::get('news', 'Admin\ArticlesController@index');
    Route::get('news/create', 'Admin\ArticlesController@getCreate');
    Route::post('news/create', 'Admin\ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'Admin\ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'Admin\ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'Admin\ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'Admin\ArticlesController@postDelete');
    Route::get('news/data', 'Admin\ArticlesController@data');
    Route::get('news/reorder', 'Admin\ArticlesController@getReorder');

    #Photo Album
    Route::get('photoalbum', 'Admin\PhotoAlbumController@index');
    Route::get('photoalbum/create', 'Admin\PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'Admin\PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'Admin\PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'Admin\PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'Admin\PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'Admin\PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'Admin\PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'Admin\PhotoAlbumController@getReorder');

    #Photo
    Route::get('photo', 'Admin\PhotoController@index');
    Route::get('photo/create', 'Admin\PhotoController@getCreate');
    Route::post('photo/create', 'Admin\PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'Admin\PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'Admin\PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'Admin\PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'Admin\PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'Admin\PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'Admin\PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'Admin\PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'Admin\PhotoController@data');
    Route::get('photo/reorder', 'Admin\PhotoController@getReorder');

    #Video
    Route::get('videoalbum', 'Admin\VideoAlbumController@index');
    Route::get('videoalbum/create', 'Admin\VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'Admin\VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'Admin\VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'Admin\VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'Admin\VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'Admin\VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'Admin\VideoAlbumController@data');
    Route::get('video/reorder', 'Admin\VideoAlbumController@getReorder');

    #Video
    Route::get('video', 'Admin\VideoController@index');
    Route::get('video/create', 'Admin\VideoController@getCreate');
    Route::post('video/create', 'Admin\VideoController@postCreate');
    Route::get('video/{id}/edit', 'Admin\VideoController@getEdit');
    Route::post('video/{id}/edit', 'Admin\VideoController@postEdit');
    Route::get('video/{id}/delete', 'Admin\VideoController@getDelete');
    Route::post('video/{id}/delete', 'Admin\VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'Admin\VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'Admin\VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'Admin\VideoController@data');
    Route::get('video/reorder', 'Admin\VideoController@getReorder');

    #Users
    Route::get('users/', 'Admin\UserController@index');
    Route::get('users/create', 'Admin\UserController@getCreate');
    Route::post('users/create', 'Admin\UserController@postCreate');
    Route::get('users/{id}/edit', 'Admin\UserController@getEdit');
    Route::post('users/{id}/edit', 'Admin\UserController@postEdit');
    Route::get('users/{id}/delete', 'Admin\UserController@getDelete');
    Route::post('users/{id}/delete', 'Admin\UserController@postDelete');
    Route::get('users/data', 'Admin\UserController@data');


});
