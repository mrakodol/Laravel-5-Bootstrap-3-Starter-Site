<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\VideoAlbum;
use Bllim\Datatables\Facade\Datatables;

class VideoAlbumController extends Controller {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Title
        $title = "Video albums";

        // Show the page
        return view('admin.videoalbum.index', compact('title'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $video_category = VideoAlbum::join('language', 'language.id', '=', 'video_album.language_id')
            ->select(array('video_album.name','language.name as language','video_album.id as images_count', 'video_album.created_at'))
            ->orderBy('video_album.position', 'ASC');

        return Datatables::of($video_category)
            -> edit_column('images_count', '<a class="btn btn-primary btn-sm" >{{ DB::table(\'video\')->where(\'video_album_id\', \'=\', $id)->count() }}</a>')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/video/\' . $id . \'/imagesforgallery\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span> Slike</a>
                    <a href="{{{ URL::to(\'admin/video/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                    <a href="{{{ URL::to(\'admin/video/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                ')
            ->remove_column('id')

            ->make();
    }

}

