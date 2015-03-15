<?php namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
	}

	public function show($id)
	{
		// Get all the blog posts
		$news = Article::find($id);

		return view('news.view_news', compact('news'));
	}

}
