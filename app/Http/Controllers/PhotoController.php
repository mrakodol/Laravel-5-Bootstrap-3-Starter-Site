<?php namespace App\Http\Controllers;

use App\Photo;
use App\PhotoAlbum;

class PhotoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function show($id)
	{
        $photo_album = PhotoAlbum::find($id);
        $photos = Photo::where('photo_album_id', $id)->get();

        return view('photo.view_album',compact('photos','photo_album'));
	}

}
