<?php
use Faker\Factory as Faker;

class ArticlesTableSeeder extends DatabaseSeeder
{

	public function run()
	{
		$faker = $this->getFaker();
		
		$article = new App\Article;
		$article->language_id = rand(1,3);
		$article->user_id = 1;
		$article->article_category_id = rand(1,2);
		$article->title = $faker->sentence;
		$article->slug = $faker->slug;
		$article->introduction = $faker->paragraph;
		$article->content = $faker->text;
		$article->source = $faker->url;
		$article->save();

		$article = new App\Article;
		$article->language_id = rand(1,3);
		$article->user_id = 1;
		$article->article_category_id = rand(1,2);
		$article->title = $faker->sentence;
		$article->slug = $faker->slug;
		$article->introduction = $faker->paragraph;
		$article->content = $faker->text;
		$article->source = $faker->url;
		$article->save();			
	}
}
