<?php
use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('languages')->delete();

        $language = new Language();
        $language->name = 'English';
        $language->lang_code = 'gb';
        $language->save();

        $language = new Language();
        $language->name = 'Српски';
        $language->lang_code = 'rs';
        $language->save();

        $language = new Language();
        $language->name = 'Bosanski';
        $language->lang_code = 'ba';
        $language->save();
    }

}
