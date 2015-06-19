<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	protected $faker;
	public function getFaker()
	{


		if (empty($this->faker))
		{
			$faker = Faker\Factory::create();
			$faker->addProvider(new Faker\Provider\Base($faker));
			$faker->addProvider(new Faker\Provider\Lorem($faker));
		}

		return $this->faker = $faker;
	 }
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
		Model::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
		$this->call('LanguagesTableSeeder');
		$this->call('ArticleCategoriesTableSeeder');
		$this->call('ArticlesTableSeeder');
    }

}
