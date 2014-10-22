<?php namespace App\Http\Controllers\Admin;

use App\VideoAlbum;
use App\Language;
use Illuminate\Routing\Controller;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\PhotoAlbumRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class VideoAlbumController extends Controller {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.videoalbum.index');
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
        return view('admin.videoalbum.create_edit', compact('languages','language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(PhotoAlbumRequest $request)
    {
        $photoalbum = new VideoAlbum();
        $photoalbum -> user_id = Auth::id();
        $photoalbum -> language_id = $request->language_id;
        $photoalbum -> name = $request->name;
        $photoalbum -> description = $request->description;
        $photoalbum -> folderid = sha1($request -> name . time());
        if ($photoalbum -> save()) {
            File::makeDirectory(public_path() . '/images/videoalbum/' . $photoalbum -> folderid);
            File::makeDirectory(public_path() . '/images/videoalbum/' . $photoalbum -> folderid . '/thumbs');
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
        $videoalbum = VideoAlbum::find($id);
        $language = $videoalbum->language_id;
        $languages = Language::all();

        return view('admin.videoalbum.create_edit',compact('videoalbum','languages','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(PhotoAlbumRequest $request, $id)
    {
        $videoalbum = VideoAlbum::find($id);
        $videoalbum -> user_id_edited = Auth::id();
        $videoalbum -> language_id = $request->language_id;
        $videoalbum -> name = $request->name;
        $videoalbum -> description = $request->description;
        $videoalbum -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $blog
     * @return Response
     */

    public function getDelete($id)
    {
        $videoalbum = VideoAlbum::find($id);
        // Show the page
        return view('admin.videoalbum.delete', compact('videoalbum'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $photoalbum = VideoAlbum::find($id);
        $photoalbum->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $video_category = VideoAlbum::join('language', 'language.id', '=', 'video_album.language_id')
            ->select(array('video_album.id','video_album.name','language.name as language','video_album.id as images_count', 'video_album.created_at'))
            ->orderBy('video_album.position', 'ASC');

        return Datatables::of($video_category)
            -> edit_column('images_count', '<a class="btn btn-primary btn-sm" >{{ DB::table(\'video\')->where(\'video_album_id\', \'=\', $id)->count() }}</a>')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/imagesforgallery\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span>  {{ Lang::get("admin/modal.items") }}</a>
                    <a href="{{{ URL::to(\'admin/videoalbum/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/videoalbum/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')

            ->make();
    }

}

