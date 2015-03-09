<?php namespace App\Http\Controllers;

use App\News;
use App\Photo;
use App\VideoAlbum;
use App\PhotoAlbum;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');

		//parent::__construct();

		//$this->news = $news;
		//$this->user = $user;
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::select('*')->orderBy('position', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();

		$sliders = Photo::join('photo_album', 'photo_album.id', '=', 'photo.photo_album_id')->where('photo.slider',
			1)->orderBy('photo.position', 'DESC')->orderBy('photo.created_at', 'DESC')->select('photo.filename',
			'photo.name', 'photo.description', 'photo_album.folderid')->get();

		$photoAlbums = PhotoAlbum::select(array(
			'photo_album.id',
			'photo_album.name',
			'photo_album.description',
			'photo_album.folderid',
			DB::raw('(select filename from ' . DB::getTablePrefix() . 'photo WHERE album_cover=TRUE and ' . DB::getTablePrefix() . 'photo.photo_album_id=' . DB::getTablePrefix() . 'photo_album.id) AS album_image'),
			DB::raw('(select filename from ' . DB::getTablePrefix() . 'photo WHERE ' . DB::getTablePrefix() . 'photo.photo_album_id=' . DB::getTablePrefix() . 'photo_album.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
		))->limit(8)->get();

		$videoAlbums = VideoAlbum::select(array(
			'video_album.id',
			'video_album.name',
			'video_album.description',
			'video_album.folderid',
			DB::raw('(select youtube from ' . DB::getTablePrefix() . 'video as v WHERE album_cover=TRUE and v.video_album_id=' . DB::getTablePrefix() . 'video_album.id) AS album_image'),
			DB::raw('(select youtube from ' . DB::getTablePrefix() . 'video WHERE ' . DB::getTablePrefix() . 'video.video_album_id=' . DB::getTablePrefix() . 'video_album.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
		))->limit(8)->get();

		return view('pages.home', compact('news', 'sliders', 'videoAlbums', 'photoAlbums'));

		//return view('pages.welcome');
	}

}