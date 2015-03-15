<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArticleCategoriesTableSeeder extends Seeder
{

	public function run()
	{
		TestDummy::times(5)->create('App\ArticleCategory');
	}

}
