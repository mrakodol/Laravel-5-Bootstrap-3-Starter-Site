<?php namespace App\Http\Controllers;

use App\User;
use App\Post;

class HomeController extends BaseController {

    /**
     * Post \Model
     * @var Post
     */
    protected $post;

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
    public function __construct(Post $post, User $user)
    {
        parent::__construct();

        $this->post = $post;
        $this->user = $user;
    }

    public function index()
	{
        // Get all the blog posts
        $posts = $this->post->orderBy('created_at', 'DESC')->paginate(10);

        return view('site.home.index',compact('posts'));
	}

}
