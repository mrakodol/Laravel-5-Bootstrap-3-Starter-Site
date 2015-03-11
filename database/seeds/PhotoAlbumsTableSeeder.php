<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PhotoAlbumsTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::times(4)->create('App\PhotoAlbum');
    }

}