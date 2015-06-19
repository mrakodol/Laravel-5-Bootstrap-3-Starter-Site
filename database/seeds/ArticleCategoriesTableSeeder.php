<?php
use Faker\Factory as Faker;

class ArticleCategoriesTableSeeder extends DatabaseSeeder
{

	public function run()
	{
		$faker = $this->getFaker();
		
		$category = new App\ArticleCategory;
		$category->language_id = rand(1,3);
		$category->user_id = 1;
		$category->title = $faker->sentence;
		$category->slug = $faker->slug;
		$category->save();

		$category = new App\ArticleCategory;
		$category->language_id = rand(1,3);
		$category->user_id = 1;
		$category->title = $faker->sentence;
		$category->slug = $faker->slug;
		$category->save();			
	}
}
