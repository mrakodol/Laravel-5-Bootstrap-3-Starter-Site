<?php

namespace App\Http\Controllers;

use App\Article;
use App\PhotoAlbum;
use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::with('author')->orderBy('position', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();

		$photoAlbums = PhotoAlbum::select(array(
			'photo_albums.id',
			'photo_albums.name',
			'photo_albums.description',
			'photo_albums.folder_id',
			DB::raw('(select filename from photos WHERE album_cover=1 AND deleted_at IS NULL and photos.photo_album_id=photo_albums.id LIMIT 1) AS album_image'),
			DB::raw('(select filename from photos WHERE photos.photo_album_id=photo_albums.id AND deleted_at IS NULL ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
		))->limit(8)->get();

		return view('pages.home', compact('articles', 'photoAlbums'));
	}

}