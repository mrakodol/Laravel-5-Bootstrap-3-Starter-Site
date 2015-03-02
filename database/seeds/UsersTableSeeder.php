<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		TestDummy::times(10)->create('App\User');

		TestDummy::create('admin_user');
		TestDummy::create('test_user');

	}

}
