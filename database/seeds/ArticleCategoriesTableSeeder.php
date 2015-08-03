<?php
use Faker\Factory as Faker;

class ArticleCategoryTableSeeder extends DatabaseSeeder
{

	public function run()
	{

		factory(App\ArticleCategory::class, 2)->create();

	}
}
