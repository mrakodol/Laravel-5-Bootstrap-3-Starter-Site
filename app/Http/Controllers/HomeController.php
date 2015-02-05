<?php namespace App\Http\Controllers;

use App\User;
use App\News;
use App\Photo;
use App\VideoAlbum;
use App\PhotoAlbum;
use Illuminate\Support\Facades\DB;

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
        $news = $this->news->orderBy('position', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();
        $sliders = Photo::join('photo_album', 'photo_album.id','=','photo.photo_album_id')
                        ->where('photo.slider',1)
                        ->orderBy('photo.position', 'DESC')
                        ->orderBy('photo.created_at', 'DESC')
                        ->select('photo.filename','photo.name','photo.description','photo_album.folderid')->get();

        $photoalbums = PhotoAlbum::select(array('photo_album.id', 'photo_album.name', 'photo_album.description',
                'photo_album.folderid',
                DB::raw('(select filename from '.DB::getTablePrefix().'photo WHERE album_cover=1 and '.DB::getTablePrefix().'photo.photo_album_id='.DB::getTablePrefix().'photo_album.id) AS album_image'),
                DB::raw('(select filename from '.DB::getTablePrefix().'photo WHERE '.DB::getTablePrefix().'photo.photo_album_id='.DB::getTablePrefix().'photo_album.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')))->limit(8)->get();

        $videoalbums = VideoAlbum::select(array('video_album.id', 'video_album.name', 'video_album.description',
                'video_album.folderid',
                DB::raw('(select youtube from '.DB::getTablePrefix().'video as v WHERE album_cover=1 and v.video_album_id='.DB::getTablePrefix().'video_album.id) AS album_image'),
                DB::raw('(select youtube from '.DB::getTablePrefix().'video WHERE '.DB::getTablePrefix().'video.video_album_id='.DB::getTablePrefix().'video_album.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')))->limit(8)->get();

        return view('site.home.index',compact('news','sliders','videoalbums','photoalbums'));
	}

}
