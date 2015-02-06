<?php
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Language
    Route::get('language', 'App\Http\Controllers\Admin\LanguageController@index');
    Route::get('language/create', 'App\Http\Controllers\Admin\LanguageController@getCreate');
    Route::post('language/create', 'App\Http\Controllers\Admin\LanguageController@postCreate');
    Route::get('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@getEdit');
    Route::post('language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@postEdit');
    Route::get('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@getDelete');
    Route::post('language/{id}/delete', 'App\Http\Controllers\Admin\LanguageController@postDelete');
    Route::get('language/data', 'App\Http\Controllers\Admin\LanguageController@data');
    Route::get('language/reorder', 'App\Http\Controllers\Admin\LanguageController@getReorder');

    #News category
    Route::get('newscategory', 'App\Http\Controllers\Admin\NewsCategoryController@index');
    Route::get('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@getCreate');
    Route::post('newscategory/create', 'App\Http\Controllers\Admin\NewsCategoryController@postCreate');
    Route::get('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@getEdit');
    Route::post('newscategory/{id}/edit', 'App\Http\Controllers\Admin\NewsCategoryController@postEdit');
    Route::get('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@getDelete');
    Route::post('newscategory/{id}/delete', 'App\Http\Controllers\Admin\NewsCategoryController@postDelete');
    Route::get('newscategory/data', 'App\Http\Controllers\Admin\NewsCategoryController@data');
    Route::get('newscategory/reorder', 'App\Http\Controllers\Admin\NewsCategoryController@getReorder');

    #News
    Route::get('news', 'App\Http\Controllers\Admin\NewsController@index');
    Route::get('news/create', 'App\Http\Controllers\Admin\NewsController@getCreate');
    Route::post('news/create', 'App\Http\Controllers\Admin\NewsController@postCreate');
    Route::get('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@getEdit');
    Route::post('news/{id}/edit', 'App\Http\Controllers\Admin\NewsController@postEdit');
    Route::get('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@getDelete');
    Route::post('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@postDelete');
    Route::get('news/data', 'App\Http\Controllers\Admin\NewsController@data');
    Route::get('news/reorder', 'App\Http\Controllers\Admin\NewsController@getReorder');

    #Photo Album
    Route::get('photoalbum', 'App\Http\Controllers\Admin\PhotoAlbumController@index');
    Route::get('photoalbum/create', 'App\Http\Controllers\Admin\PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'App\Http\Controllers\Admin\PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'App\Http\Controllers\Admin\PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'App\Http\Controllers\Admin\PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'App\Http\Controllers\Admin\PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'App\Http\Controllers\Admin\PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'App\Http\Controllers\Admin\PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'App\Http\Controllers\Admin\PhotoAlbumController@getReorder');

    #Photo
    Route::get('photo', 'App\Http\Controllers\Admin\PhotoController@index');
    Route::get('photo/create', 'App\Http\Controllers\Admin\PhotoController@getCreate');
    Route::post('photo/create', 'App\Http\Controllers\Admin\PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'App\Http\Controllers\Admin\PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'App\Http\Controllers\Admin\PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'App\Http\Controllers\Admin\PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'App\Http\Controllers\Admin\PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'App\Http\Controllers\Admin\PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'App\Http\Controllers\Admin\PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'App\Http\Controllers\Admin\PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'App\Http\Controllers\Admin\PhotoController@data');
    Route::get('photo/reorder', 'App\Http\Controllers\Admin\PhotoController@getReorder');

    #Video
    Route::get('videoalbum', 'App\Http\Controllers\Admin\VideoAlbumController@index');
    Route::get('videoalbum/create', 'App\Http\Controllers\Admin\VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'App\Http\Controllers\Admin\VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'App\Http\Controllers\Admin\VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'App\Http\Controllers\Admin\VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'App\Http\Controllers\Admin\VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'App\Http\Controllers\Admin\VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'App\Http\Controllers\Admin\VideoAlbumController@data');
    Route::get('video/reorder', 'App\Http\Controllers\Admin\VideoAlbumController@getReorder');

    #Video
    Route::get('video', 'App\Http\Controllers\Admin\VideoController@index');
    Route::get('video/create', 'App\Http\Controllers\Admin\VideoController@getCreate');
    Route::post('video/create', 'App\Http\Controllers\Admin\VideoController@postCreate');
    Route::get('video/{id}/edit', 'App\Http\Controllers\Admin\VideoController@getEdit');
    Route::post('video/{id}/edit', 'App\Http\Controllers\Admin\VideoController@postEdit');
    Route::get('video/{id}/delete', 'App\Http\Controllers\Admin\VideoController@getDelete');
    Route::post('video/{id}/delete', 'App\Http\Controllers\Admin\VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'App\Http\Controllers\Admin\VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'App\Http\Controllers\Admin\VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'App\Http\Controllers\Admin\VideoController@data');
    Route::get('video/reorder', 'App\Http\Controllers\Admin\VideoController@getReorder');

    #Users
    Route::get('users/', 'App\Http\Controllers\Admin\UserController@index');
    Route::get('users/create', 'App\Http\Controllers\Admin\UserController@getCreate');
    Route::post('users/create', 'App\Http\Controllers\Admin\UserController@postCreate');
    Route::get('users/{id}/edit', 'App\Http\Controllers\Admin\UserController@getEdit');
    Route::post('users/{id}/edit', 'App\Http\Controllers\Admin\UserController@postEdit');
    Route::get('users/{id}/delete', 'App\Http\Controllers\Admin\UserController@getDelete');
    Route::post('users/{id}/delete', 'App\Http\Controllers\Admin\UserController@postDelete');
    Route::get('users/data', 'App\Http\Controllers\Admin\UserController@data');

    #Roles
    Route::get('roles/', 'App\Http\Controllers\Admin\RoleController@index');
    Route::get('roles/create', 'App\Http\Controllers\Admin\RoleController@getCreate');
    Route::post('roles/create', 'App\Http\Controllers\Admin\RoleController@postCreate');
    Route::get('roles/{id}/edit', 'App\Http\Controllers\Admin\RoleController@getEdit');
    Route::post('roles/{id}/edit', 'App\Http\Controllers\Admin\RoleController@postEdit');
    Route::get('roles/{id}/delete', 'App\Http\Controllers\Admin\RoleController@getDelete');
    Route::post('roles/{id}/delete', 'App\Http\Controllers\Admin\RoleController@postDelete');
    Route::get('roles/data', 'App\Http\Controllers\Admin\RoleController@data');

    #Admin Dashboard
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index');

});
