<?php namespace App\Http\Controllers;

use App\News;

class NewsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id)
	{
		// Get all the blog posts
		$news = News::find($id);

		return view('news.view_news', compact('news'));
	}

}
