<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('articles')->delete();

		TestDummy::times(3)->create('App\Article');
	}

}