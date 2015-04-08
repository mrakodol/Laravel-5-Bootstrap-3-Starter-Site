<?php namespace App\Http\Controllers\Admin;

use App\VideoAlbum;
use App\Language;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\PhotoAlbumRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\File;
use Datatables;

class VideoAlbumController extends AdminController {

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
        $photoalbum -> folder_id = sha1($request -> name . time());
        $photoalbum -> save();
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
     * @param $id
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
     * @param $id
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
        $video_category = VideoAlbum::join('languages', 'languages.id', '=', 'video_albums.language_id')
            ->select(array('video_albums.id','video_albums.name','languages.name as language','video_albums.id as images_count', 'video_albums.created_at'))
            ->orderBy('video_albums.position', 'ASC');

        return Datatables::of($video_category)
            -> edit_column('images_count', '<a class="btn btn-primary btn-sm" >{{ DB::table(\'videos\')->where(\'video_album_id\', \'=\', $id)->count() }}</a>')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/itemsforalbum\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span>  {{ trans("admin/modal.items") }}</a>
                    <a href="{{{ URL::to(\'admin/videoalbum/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/videoalbum/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
            ->remove_column('id')

            ->make();
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
                VideoAlbum::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}

