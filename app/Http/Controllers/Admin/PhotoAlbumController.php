<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\PhotoAlbum;
use Bllim\Datatables\Facade\Datatables;

class PhotoAlbumController extends Controller {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Title
        $title = "Photo albums";

        // Show the page
        return view('admin.photoalbum.index', compact('title'));
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
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/imagesforgallery\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span> Items</a>
                    <a href="{{{ URL::to(\'admin/news/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                    <a href="{{{ URL::to(\'admin/news/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
