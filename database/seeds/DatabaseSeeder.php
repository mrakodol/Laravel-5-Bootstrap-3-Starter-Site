<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
       	$this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
		$this->call('LanguagesTableSeeder');
		$this->call('NewsCategoryTableSeeder');
		$this->call('NewsTableSeeder');
    }

}