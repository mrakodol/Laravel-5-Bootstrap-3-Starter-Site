<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Video;
use App\VideoAlbum;
use App\Language;
use App\Http\Requests\Admin\VideoRequest;
use App\Http\Requests\Admin\ReorderRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Datatables;

class VideoController extends AdminController {

    /*
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function index()
    {
        // Show the page
        return view('admin.video.index');
    }

    /**
     * Show a list of all the video posts.
     *
     * @return View
     */
    public function itemsForAlbum($id) {

        $album = VideoAlbum::find($id);
        // Show the page
        return view('admin.video.index', compact('album'));
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
        $videoalbums = VideoAlbum::all();
        $videoalbum = "";
        // Show the page
        return view('admin.video.create_edit', compact('languages', 'language','videoalbums','videoalbum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(VideoRequest $request)
    {
        $video = new Video();
        $video -> user_id = Auth::id();
        $video -> language_id = $request->language_id;
        $video -> name = $request->name;
        $video -> video_album_id = $request->video_album_id;
        $video -> description = $request->description;
        $video -> album_cover = $request->album_cover;

        if($request->youtube!="") {
            $youtube = explode('?v=', $request->youtube);
            $video->youtube = rtrim($youtube[1]);
        }
        $video_file = "";
        if($request->hasFile('video'))
        {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $video_file = sha1($filename . time()) . '.' . $extension;
            $video -> filename = $video_file;
        }
        $video -> save();

        if($request->hasFile('video'))
        {
            $videoalbum = VideoAlbum::find($request->video_album_id);
            $destinationPath = public_path() . '/appfiles/videoalbum/'.$videoalbum->folder_id.'/';
            $request->file('video')->move($destinationPath, $video_file);
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
        $video = Video::find($id);
        if($video ->youtube!="")
        {
            $video->youtube = 'https://www.youtube.com/watch?v='.$video->youtube;
        }
        $languages = Language::all();
        $language = $video->language_id;
        $videoalbums = VideoAlbum::all();
        $videoalbum = $video->video_album_id;

        return view('admin.video.create_edit',compact('video','languages','language','videoalbums','videoalbum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(VideoRequest $request, $id)
    {
        $video = Video::find($id);
        $video -> user_id = Auth::id();
        $video -> language_id = $request->language_id;
        $video -> name = $request->name;
        $video -> video_album_id = $request->video_album_id;
        $video -> description = $request->description;
        $video -> album_cover = $request->album_cover;

        if($request->youtube!="") {
            $youtube = explode('?v=', $request->youtube);
            $video->youtube = rtrim($youtube[1]);
        }

        $video_file = $video->filename;
        if($request->hasFile('video'))
        {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $video_file = sha1($filename . time()) . '.' . $extension;
            $video -> filename = $video_file;
        }
        $video -> save();

        if($request->hasFile('video'))
        {
            $videoalbum = VideoAlbum::find($request->video_album_id);
            $destinationPath = public_path() . '/appfiles/videoalbum/'.$videoalbum->folder_id.'/';
            $request->file('video')->move($destinationPath, $video_file);
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
        $video = Video::find($id);
        // Show the page
        return view('admin.video.delete', compact('video'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $video = Video::find($id);
        $video->delete();
    }

    /**
     * Set a Album cover.
     *
     * @param $id
     * @return Response
     */

    public function getAlbumCover($id,$album=0)
    {
        $video = Video::find($id);
        $videoalbums = Video::where('video_album_id',$video->video_album_id)->get();
        foreach($videoalbums as $item)
        {
            $item -> album_cover = 0;
            $item -> save();
        }
        $video -> album_cover = 1;
        $video -> save();
        // Show the page
        return redirect( (($album==0)?'/admin/video':'/admin/video/'.$album.'/itemsforalbum'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data($albumid=0) {
        $condition =(intval($albumid)==0)?">":"=";
        $videoalbum = Video::join('languages', 'languages.id', '=', 'videos.language_id')
            ->join('video_albums', 'video_albums.id', '=', 'videos.video_album_id')
            ->where('videos.video_album_id',$condition,$albumid)
            ->orderBy('videos.position')
            ->select(array('videos.id',DB::raw($albumid . ' as albumid'), DB::getTablePrefix().'videos.name',
                'video_albums.name as category',
                DB::getTablePrefix().'videos.album_cover','languages.name as language',
                DB::getTablePrefix().'videos.created_at'));

        return Datatables::of($videoalbum)
            -> edit_column('album_cover', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/\' . $albumid . \'/albumcover\' ) }}}" class="btn btn-warning btn-sm" >@if ($album_cover=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif</a>')
            -> add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/video/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
                Video::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }
}
