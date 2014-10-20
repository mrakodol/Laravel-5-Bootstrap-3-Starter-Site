<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\SliderAlbum;
use Bllim\Datatables\Facade\Datatables;

class SliderAlbumController extends Controller {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Title
        $title = "Slider albums";

        // Show the page
        return view('admin.slideralbum.index', compact('title'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $sliders_category = SliderAlbum::join('language', 'language.id', '=', 'slider_album.language_id')
            ->select(array('slider_album.name','language.name as language','slider_album.id as images_count',
                'slider_album.created_at'))
            ->orderBy('slider_album.position', 'ASC');

        return Datatables::of($sliders_category)
            -> edit_column('images_count', '<a class="btn btn-primary btn-sm" >{{ DB::table(\'slider\')->where(\'slider_album_id\', \'=\', $id)->count() }}</a>')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/slider/\' . $id . \'/imagesforgallery\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span> Slike</a>
                    <a href="{{{ URL::to(\'admin/slider/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                    <a href="{{{ URL::to(\'admin/slider/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
