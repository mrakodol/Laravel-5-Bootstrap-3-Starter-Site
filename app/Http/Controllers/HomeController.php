<?php namespace App\Http\Controllers;

use App\User;
use App\News;

class HomeController extends BaseController {

    /**
     * News \Model
     * @var Post
     */
    protected $news;

    /**
     * User \Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param \Post $post
     * @param \User $user
     */
    public function __construct(News $news, User $user)
    {
        parent::__construct();

        $this->news = $news;
        $this->user = $user;
    }

    public function index()
	{
        // Get all the blog posts
        $news = $this->news->orderBy('created_at', 'DESC')->paginate(10);

        return view('site.home.index',compact('news'));
	}

}
