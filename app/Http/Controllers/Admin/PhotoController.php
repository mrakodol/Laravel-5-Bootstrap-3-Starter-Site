<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Photo;
use Bllim\Datatables\Facade\Datatables;

class PhotoController extends AdminController {
	/**
	 * photo Model
	 * @var photo
	 */
	protected $photo;
	
   /**
	 * Inject the models.
	 * @param photo $post
	 */
	public function __construct(Photo $photo) {
		parent::__construct();
		$this -> photo = $photo;
	}
	/**
	 * Show a list of all the photo posts.
	 *
	 * @return View
	 */
	public function index() {
			
		// Grab all the photo posts
		$photo = $this -> photo;
		$title = "Photos";
		// Show the page
		return view('admin.photo.index', compact('photo','title'));
	}

	/**
	 * Show a list of all the photo formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data() {
		$photoalbum = Photo::join('language', 'language.id', '=', 'photo.language_id')
		->join('photo_album', 'photo_album.id', '=', 'photo.photo_album_id')
		->select(array('photo.id', 'photo.name','photo_album.name as category','language.name as language', 'photo.created_at'));

		return Datatables::of($photoalbum) 
			-> add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="{{{ URL::to(\'admin/photo/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            ') -> remove_column('id') -> make();
	}
	/**
	 * Reorder navigation
	 *
	 * @param order navigation
	 * @param navigation list
	 * @return boolean is sorting would be a correct
	 * /
	 */
	public function getReorder() {
		$list = Input::get('list');
		$items = explode(",", $list);
		$order = 1;
		foreach ($items as $value) {
			if ($value != '') {
				Photo::where('id', '=', $value) -> update(array('position' => $order));

				$order++;
			}
		}
		return $list;
	}
}
