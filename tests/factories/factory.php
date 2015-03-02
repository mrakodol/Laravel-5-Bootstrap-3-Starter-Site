<?php

$factory('App\Article', [
	'user_id'      => 1,
	'title'        => $faker->sentence,
	'excerpt'      => $faker->paragraph,
	'body'         => $faker->paragraphs,
	'published_at' => \Carbon\Carbon::now()
]);

$factory('App\Tag', [
	'name'              => $faker->word,
]);

$factory('App\User', [
	'name'              => $faker->name,
	'username'          => $faker->userName,
	'email'             => $faker->email,
	'password'          => $faker->word,
	//'confirmed'         => 1,
	//'confirmation_code' => md5(microtime() . Config::get('app.key')),
]);

$factory('App\User', 'admin_user', [
	'name'              => 'Admin User',
	'username'          => 'admin_user',
	'email'             => 'admin@admin.com',
	'password'          => bcrypt('admin'),
	//'confirmed'         => 1,
	//'confirmation_code' => md5(microtime() . Config::get('app.key')),
]);

$factory('App\User', 'test_user', [
	'name'              => 'Test User',
	'username'          => 'test_user',
	'email'             => 'user@user.com',
	'password'          => bcrypt('user'),
	//'confirmed'         => 1,
	//'confirmation_code' => md5(microtime() . Config::get('app.key')),
]);

