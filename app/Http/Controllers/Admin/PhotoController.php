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

class PhotoController extends AdminController
{

    public function __construct()
    {
        view()->share('type', 'photo');
    }

    /**
     * Show a list of all the photo posts.
     *
     * @return View
     */
    public function index()
    {
        // Show the page
        return view('admin.photo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $languages = Language::lists('name', 'id')->toArray();
        $photoalbums = PhotoAlbum::lists('name', 'id')->toArray();
        // Show the page
        return view('admin.photo.create_edit', compact('languages', 'photoalbums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PhotoRequest $request)
    {
        $photo = new Photo($request->except('image'));
        $photo->user_id = Auth::id();

        $picture = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $photo->filename = $picture;
        $photo->save();

        if ($request->hasFile('image')) {
            $photoalbum = PhotoAlbum::find($request->photo_album_id);
            $destinationPath = public_path() . '/appfiles/photoalbum/' . $photoalbum->folder_id . '/';
            $request->file('image')->move($destinationPath, $picture);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Photo $photo)
    {
        $languages = Language::lists('name', 'id')->toArray();
        $photoalbums = PhotoAlbum::lists('name', 'id')->toArray();
        return view('admin.photo.create_edit', compact('photo', 'languages', 'photoalbums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PhotoRequest $request, Photo $photo)
    {
        $photo->user_id_edited = Auth::id();
        $picture = $photo->filename;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $photo->filename = $picture;
        $photo->update($request->except('image'));

        if ($request->hasFile('image')) {
            $photoalbum = PhotoAlbum::find($request->photo_album_id);
            $destinationPath = public_path() . '/appfiles/photoalbum/' . $photoalbum->folder_id . '/';
            $request->file('image')->move($destinationPath, $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function delete(Photo $photo)
    {
        return view('admin.photo.delete', compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $photos = Photo::join('languages', 'languages.id', '=', 'photos.language_id')
            ->join('photo_albums', 'photo_albums.id', '=', 'photos.photo_album_id')
            ->whereNull('photo_albums.deleted_at')
            ->orderBy('photos.position')
            ->select(array('photos.id', 'photos.name',
                'photo_albums.name as category', 'photos.album_cover',
                'photos.slider', 'languages.name as language', 'photos.created_at'));

        return Datatables::of($photos)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/photo/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')
            ->remove_column('albumid')
            ->make();
    }
}
