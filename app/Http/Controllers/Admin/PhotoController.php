<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\PhotoAlbum;
use App\Photo;
use Bllim\Datatables\Facade\Datatables;

class PhotoController extends AdminController {
	/**
	 * photo Model
	 * @var photo
	 */
	protected $photoalbum;
	protected $photo;
	
   /**
	 * Inject the models.
	 * @param photo $post
	 */
	public function __construct(PhotoAlbum $photoalbum, Photo $photo) {
		parent::__construct();
		$this -> photoalbum = $photoalbum;
		$this -> photo = $photo;
	}
	/**
	 * Show a list of all the photo posts.
	 *
	 * @return View
	 */
	public function index() {
			
		// Grab all the photo posts
		$photoalbum = $this -> photoalbum;
		$title = "Photos";
		// Show the page
		return view('admin.photo.index', compact('photoalbum','title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		// Title
		$title = "New photo albums";
		$languages = Language::all();
		$language = "";
		// Show the page
		return View::make('admin.photo.create_edit', compact('title','languages' , 'language'));
	}

	public function store($object_id) {
		// Declare the rules for the form validation
		$rules = array('name' => 'required|min:3|max:250');

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success
		if ($validator -> passes()) {

			// Create a new photo
			$user = Auth::user();
			$this -> photoalbum->user_id = $user->id;
			$this -> photoalbum -> name = Input::get('name');
			$this -> photoalbum -> language_id = Input::get('language_id');
			$this -> photoalbum -> description = Input::get('description');
			$this -> photoalbum -> folderid = sha1($this -> photoalbum -> name . time());
			// Was the photo created?
			if ($this -> photoalbum -> save()) {
				File::makeDirectory(public_path() . '/images/photoalbum/' . $this -> photoalbum -> folderid);
				File::makeDirectory(public_path() . '/images/photoalbum/' . $this -> photoalbum -> folderid . '/thumbs');

				// Redirect to the new photo post page
				return Redirect::to('admin/photo/' . $this -> photoalbum -> id . '/edit') -> with('success', "Uspješno kreirano!");
			}

			// Redirect to the photo create page
			return Redirect::to('admin/photo/create') -> with('error', "Greška pri kreiranju");
		}

		// Form validation failed
		return Redirect::to('admin/photo/create') -> withInput() -> withErrors($validator);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $photo
	 * @return Response
	 */
	public function edit($id) {
		
		$photoalbum = PhotoAlbum::find($id);
        // Title
		$languages = Language::all();
		$language = $photoalbum->language_id;

		// Show the page
		return View::make('admin.photo.create_edit', compact('photoalbum', 'languages', 'language'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $id
	 * @return Response
	 */
	public function update($id) {

		// Declare the rules for the form validation
		$rules = array('name' => 'required|min:3|max:250');

		$validator = Validator::make(Input::all(), $rules);

		$photoalbum = PhotoAlbum::find($id);

		$inputs = Input::all();

		// Check if the form validates with success
		if ($validator -> passes()) {
			 // Update the photo post data
			$user = Auth::user();
			$photoalbum->user_id_edited = $user->id;
            $photoalbum->name            = Input::get('name');
            $photoalbum->language_id             = Input::get('language_id');
            $photoalbum->description          = Input::get('description');
			
			$photoalbum -> save();
		}

		// Form validation failed
		return Redirect::to('admin/photo/' . $photoalbum -> id . '/edit') -> withInput() -> withErrors($validator);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function destroy($id)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
        	$photoalbum = PhotoAlbum::find($id);
        	$photoalbum->delete();
        }
        // There was a problem deleting the photo post
        return Redirect::to('admin/photo')->with('error', "Error in delete");
    }

	/**
	 * Show a list of all the photo formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function data() {
		$photoalbum = PhotoAlbum::join('language', 'language.id', '=', 'photo_album.language_id')
		->select(array('photo_album.id', 'photo_album.name','language.name as language', 'photo_album.created_at'));

		return Datatables::of($photoalbum) 
			-> add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                <a href="{{{ URL::to(\'admin/photo/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
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
				PhotoAlbum::where('id', '=', $value) -> update(array('position' => $order));

				$order++;
			}
		}
		return $list;
	}
}
