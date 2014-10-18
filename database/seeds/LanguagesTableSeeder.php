<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder {

    public function run()
    {
       $language = array(
            array(
            	'name'      => 'English',
                'lang_code'      => 'en',
                'icon'   => "icon_flag_gb.gif",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'Српски',
                'lang_code'      => 'cr',
                'icon'   => "icon_flag_sr.png",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'Srpski',
                'lang_code'      => 'lt',
                'icon'   => "icon_flag_sr.png",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'deleted_at' => new DateTime,
            )
			
        );

        DB::table('language')->insert( $language );
    }

}
