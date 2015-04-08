<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Photo;
use App\PhotoAlbum;
use App\Language;
use App\Http\Requests\Admin\PhotoRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Helpers\Thumbnail;
use Illuminate\Support\Facades\DB;
use Datatables;

class PhotoController extends AdminController {
	/**
 * Show a list of all the photo posts.
 *
 * @return View
 */
    public function index() {
        // Show the page
        return view('admin.photo.index');
    }

    /**
     * Show a list of all the photo posts.
     *
     * @return View
     */
    public function itemsForAlbum($id) {
        $album = PhotoAlbum::find($id);
        // Show the page
        return view('admin.photo.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $languages = Language::all();
        $language = "";
        $photoalbums = PhotoAlbum::all();
        $photoalbum = "";
        // Show the page
        return view('admin.photo.create_edit', compact('languages', 'language','photoalbums','photoalbum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(PhotoRequest $request)
    {
        $photo = new Photo();
        $photo -> user_id = Auth::id();
        $photo -> language_id = $request->language_id;
        $photo -> name = $request->name;
        $photo -> photo_album_id = $request->photo_album_id;
        $photo -> description = $request->description;
        $photo -> slider = $request->slider;
        $photo -> album_cover = $request->album_cover;
        $picture = "";
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $photo -> filename = $picture;
        $photo -> save();

        if($request->hasFile('image'))
        {
            $photoalbum = PhotoAlbum::find($request->photo_album_id);
            $destinationPath = public_path() . '/appfiles/photoalbum/'.$photoalbum->folder_id.'/';
            $request->file('image')->move($destinationPath, $picture);

            $path2 = public_path() . '/appfiles/photoalbum/' . $photoalbum->folder_id . '/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);

        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $photo = Photo::find($id);
        $languages = Language::all();
        $language = $photo->language_id;
        $photoalbums = PhotoAlbum::all();
        $photoalbum = $photo->photo_album_id;

        return view('admin.photo.create_edit',compact('photo','languages','language','photoalbums','photoalbum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(PhotoRequest $request, $id)
    {
        $photo = Photo::find($id);
        $photo -> user_id = Auth::id();
        $photo -> language_id = $request->language_id;
        $photo -> name = $request->name;
        $photo -> photo_album_id = $request->photo_album_id;
        $photo -> description = $request->description;
        $photo -> slider = $request->slider;
        $photo -> album_cover = $request->album_cover;

        $picture = $photo->filename;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $photo -> filename = $picture;
        $photo -> save();

        if($request->hasFile('image'))
        {
            $photoalbum = PhotoAlbum::find($request->photo_album_id);
            $destinationPath = public_path() . '/appfiles/photoalbum/'.$photoalbum->folder_id.'/';
            $request->file('image')->move($destinationPath, $picture);

            $path2 = public_path() . '/appfiles/photoalbum/' . $photoalbum->folder_id . '/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $photo = Photo::find($id);
        // Show the page
        return view('admin.photo.delete', compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $photo = Photo::find($id);
        $photo->delete();
    }

    /**
     * Set a Album cover.
     *
     * @param $id
     * @return Response
     */

    public function getAlbumCover($id,$album=0)
    {
        $photo = Photo::find($id);
        $photoalbums = Photo::where('photo_album_id',$photo->photo_album_id)->get();
        foreach($photoalbums as $item)
        {
            $item -> album_cover = 0;
            $item -> save();
        }
        $photo -> album_cover = 1;
        $photo -> save();
        // Show the page
        return redirect( (($album==0)?'/admin/photo':'/admin/photo/'.$album.'/itemsforalbum'));
    }

    public function getSlider($id,$album=0)
    {
        $photo = Photo::find($id);
        $photo->slider = ($photo -> slider + 1) % 2;
        $photo->save();
        // Show the page
        return redirect( (($album==0)?'/admin/photo':'/admin/photo/'.$album.'/itemsforalbum'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
	public function data($albumid=0) {
        $condition =(intval($albumid)==0)?">":"=";
		$photoalbum = Photo::join('languages', 'languages.id', '=', 'photos.language_id')
		    ->join('photo_albums', 'photo_albums.id', '=', 'photos.photo_album_id')
            ->where('photos.photo_album_id',$condition,$albumid)
            ->orderBy('photos.position')
		    ->select(array('photos.id',DB::raw($albumid . ' as albumid'), DB::getTablePrefix().'photos.name',
		        'photo_albums.name as category',DB::getTablePrefix().'photos.album_cover',
		        DB::getTablePrefix().'photos.slider',
                'languages.name as language', DB::getTablePrefix().'photos.created_at'));

		return Datatables::of($photoalbum)
            -> edit_column('album_cover', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/\' . $albumid . \'/albumcover\' ) }}}" class="btn btn-warning btn-sm" >@if ($album_cover=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif</a>')
            -> edit_column('slider', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/\' . $albumid . \'/slider\' ) }}}" class="btn btn-warning btn-sm" >@if ($slider=="1") <span class=\'glyphicon glyphicon-ok\'></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif</a>')
            -> add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/photo/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">') -> remove_column('id')
            -> remove_column('albumid')-> make();
	}

    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
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
