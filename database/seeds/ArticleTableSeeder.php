<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{

	public function run()
	{

		factory(App\Article::class, 2)->create();

	}
}
