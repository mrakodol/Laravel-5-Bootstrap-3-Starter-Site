<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Video;
use Bllim\Datatables\Facade\Datatables;

class VideoController extends Controller {

    /*
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function index()
    {
        // Title
        $title = "Videos";

        // Show the page
        return view('admin.video.index', compact('title'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $videos = Video::join('language', 'language.id', '=', 'video.language_id')
            ->join('video_album', 'video_album.id', '=', 'video.video_album_id')
            ->select(array('video.name','video_album.name as category', 'language.name as language', 'video.created_at'))
            ->orderBy('video.position', 'ASC');

        return Datatables::of($videos)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                    <a href="{{{ URL::to(\'admin/video/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
