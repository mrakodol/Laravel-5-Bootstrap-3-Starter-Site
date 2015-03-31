<?php

$faker->seed(1234); // manage image library

$factory('App\User', [
    'name' => $faker->name,
    'username' => $faker->unique()->userName,
    'email' => $faker->email,
    'password' => $faker->word,
    'confirmed' => $faker->boolean(50),
    'confirmation_code' => md5(microtime() . env('APP_KEY')),
]);

$factory('App\ArticleCategory', [
    'language_id' => $faker->numberBetween(1,3),
    'title' => $faker->words,
    'user_id' => $faker->numberBetween(1,3)
]);

$factory('App\Article', [
    'language_id' => $faker->numberBetween(1,3),
    'user_id' => $faker->numberBetween(1,3),
    'article_category_id' => $faker->numberBetween(1,3),
    'title' => $faker->words,
    'introduction' => $faker->paragraph,
    'content' => $faker->paragraphs
]);

$factory('App\PhotoAlbum', [
    'language_id' => $faker->numberBetween(1,3),
    'position' => $faker->randomNumber,
    'name' => $faker->words,
    'description' => $faker->paragraph,
    'folder_id'=> '',
    'user_id' => $faker->numberBetween(1,3)
]);

$factory('App\Photo', [
    'language_id' => $faker->numberBetween(1,3),
    'position' => $faker->boolean(50),
    'slider' => false,
//    TODO: create variable for image path
    'filename' => $faker->image($dir = public_path().'/appfiles/photoalbum', $width = 320, $height = 240),
    'name' => $faker->word,
    'description' => $faker->paragraph,
    'photo_album_id'=> $faker->numberBetween(1,3),
    'album_cover' => $faker->boolean(50),
    'user_id' => $faker->numberBetween(1,3)
]);

$factory('App\VideoAlbum', [
    'language_id' => $faker->numberBetween(1,3),
    'position' => $faker->randomNumber,
    'name' => $faker->words,
    'description' => $faker->paragraph,
    'folder_id'=> '',
    'user_id' => $faker->numberBetween(1,3)
]);

$factory('App\Video', [
    'language_id' => $faker->numberBetween(1,3),
    'position' => $faker->boolean(50),
//    TODO: create variable for image path
    'filename' => $faker->image($dir = public_path().'/appfiles/videoalbum', $width = 320, $height = 240),
    'name' => $faker->word,
    'description' => $faker->paragraph,
    'youtube' => 'https://www.youtube.com/watch?v=FIZ_gDOrzGk',
    'video_album_id'=> $faker->numberBetween(1,3),
    'album_cover' => $faker->boolean(50),
    'user_id' => $faker->numberBetween(1,3)
]);

//image($dir = '/tmp', $width = 640, $height = 480)
