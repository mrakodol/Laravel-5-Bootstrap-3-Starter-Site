<?php namespace App\Http\Controllers\Admin;

use App\PhotoAlbum;
use App\Language;
use Illuminate\Routing\Controller;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\PhotoAlbumRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class PhotoAlbumController extends Controller {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.photoalbum.index');
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
        // Show the page
        return view('admin.photoalbum.create_edit', compact('languages','language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(PhotoAlbumRequest $request)
    {
        $photoalbum = new PhotoAlbum();
        $photoalbum -> user_id = Auth::id();
        $photoalbum -> language_id = $request->language_id;
        $photoalbum -> name = $request->name;
        $photoalbum -> description = $request->description;
        $photoalbum -> folderid = sha1($request -> name . time());
        if ($photoalbum -> save()) {
            File::makeDirectory(public_path() . '/images/photoalbum/' . $photoalbum -> folderid);
            File::makeDirectory(public_path() . '/images/photoalbum/' . $photoalbum -> folderid . '/thumbs');
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
        $photoalbum = PhotoAlbum::find($id);
        $language = $photoalbum->language_id;
        $languages = Language::all();

        return view('admin.photoalbum.create_edit',compact('photoalbum','languages','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(PhotoAlbumRequest $request, $id)
    {
        $photoalbum = PhotoAlbum::find($id);
        $photoalbum -> user_id_edited = Auth::id();
        $photoalbum -> language_id = $request->language_id;
        $photoalbum -> name = $request->name;
        $photoalbum -> description = $request->description;
        $photoalbum -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $blog
     * @return Response
     */

    public function getDelete($id)
    {
        $photoalbum = PhotoAlbum::find($id);
        // Show the page
        return view('admin.photoalbum.delete', compact('photoalbum'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $photoalbum = PhotoAlbum::find($id);
        $photoalbum->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $photo_category = PhotoAlbum::join('language', 'language.id', '=', 'photo_album.language_id')
            ->select(array('photo_album.id','photo_album.name','language.name as language','photo_album.id as images_count', 'photo_album.created_at'))
            ->orderBy('photo_album.position', 'ASC');

        return Datatables::of($photo_category)
            -> edit_column('images_count', '<a class="btn btn-primary btn-sm" >{{ DB::table(\'photo\')->where(\'photo_album_id\', \'=\', $id)->count() }}</a>')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/imagesforgallery\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span>  {{ Lang::get("admin/modal.items") }}</a>
                    <a href="{{{ URL::to(\'admin/photoalbum/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/photoalbum/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
