<?php namespace App\Http\Controllers;

use App\News;

class NewsController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function item($id)
	{
        // Get all the blog posts
        $news = News::find($id);

        return view('site.news.view_news',compact('news'));
	}

}
