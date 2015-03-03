<?php namespace App\Http\Controllers;

use App\Video;
use App\VideoAlbum;

class VideoController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function item($id)
	{
        $video_album = VideoAlbum::find($id);
        $videos = Video::where('video_album_id', $id)->get();

        return view('site.video.view_album',compact('videos','video_album'));
	}

}
