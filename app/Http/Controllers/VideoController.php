<?php namespace App\Http\Controllers;

use App\Video;
use App\VideoAlbum;

class VideoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function show($id)
	{
        $video_album = VideoAlbum::find($id);
        $videos = Video::where('video_album_id', $id)->get();

        return view('video.view_album',compact('videos','video_album'));
	}

}
