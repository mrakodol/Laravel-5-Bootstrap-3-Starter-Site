<?php

$faker->locale('en_US'); // set Locale of faked data - see https://github.com/fzaninotto/Faker/tree/master/src/Faker/Provider
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
    'language_id' => $faker->numberBetween(1, 3),
    'title' => $faker->words,
    'user_id' => $faker->numberBetween(1, 3)
]);

$factory('App\Article', [
    'language_id' => $faker->numberBetween(1, 3),
    'user_id' => $faker->numberBetween(1, 3),
    'article_category_id' => $faker->numberBetween(1, 3),
    'title' => $faker->words,
    'introduction' => $faker->paragraph,
    'content' => $faker->paragraphs
]);

$factory('App\PhotoAlbum', [
    'language_id' => $faker->numberBetween(1, 3),
    'position' => $faker->randomNumber,
    'name' => $faker->words,
    'description' => $faker->paragraph,
    'folder_id' => '',
    'user_id' => $faker->numberBetween(1, 3)
]);

$factory('App\Photo', function ($faker) {

    //    TODO: use storage_path() and implement access control
//    $storage_path = storage_path('app/photoalbum');
    $storage_path = public_path('appfiles/photoalbum');
    $path = $faker->image($storage_path, $width = 320, $height = 240);
    $path_parts = pathinfo($path);

    $filename = $path_parts['filename'] . "." . $path_parts['extension'];

    // create thumb
    Image::make($path)->resize(null, 164, function ($constraint) {
        $constraint->aspectRatio();
    })->save($storage_path . "/thumbs/" . $filename);

    return [
        'language_id' => $faker->numberBetween(1, 3),
        'position' => $faker->boolean(50),
        'slider' => false,
        'filename' => $filename,
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'photo_album_id' => $faker->numberBetween(1, 3),
        'album_cover' => $faker->boolean(50),
        'user_id' => $faker->numberBetween(1, 3)
    ];
});

$factory('App\VideoAlbum', [
    'language_id' => $faker->numberBetween(1, 3),
    'position' => $faker->randomNumber,
    'name' => $faker->words,
    'description' => $faker->paragraph,
    'folder_id' => '',
    'user_id' => $faker->numberBetween(1, 3)
]);

$factory('App\Video', function ($faker) {

//    TODO: use storage_path() and implement access control
//    $storage_path = storage_path('app/videoalbum');
    $storage_path = public_path('appfiles/videoalbum');
    $path = $faker->image($storage_path, $width = 320, $height = 240);
    $path_parts = pathinfo($path);

    $filename = $path_parts['filename'] . "." . $path_parts['extension'];

    // create thumb
    Image::make($path)->resize(null, 164, function ($constraint) {
        $constraint->aspectRatio();
    })->save($storage_path . "/thumbs/" . $filename);
    
    return [
        'language_id' => $faker->numberBetween(1, 3),
        'position' => $faker->boolean(50),
        'filename' => $filename,
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'youtube' => 'https://www.youtube.com/watch?v=FIZ_gDOrzGk',
        'video_album_id' => $faker->numberBetween(1, 3),
        'album_cover' => $faker->boolean(50),
        'user_id' => $faker->numberBetween(1, 3)
    ];
});
