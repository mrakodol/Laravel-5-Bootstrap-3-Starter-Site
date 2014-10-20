<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Slider;
use Bllim\Datatables\Facade\Datatables;

class SliderController extends Controller {

    /*
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function index()
    {
        // Title
        $title = "Sliders";

        // Show the page
        return view('admin.slider.index', compact('title'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $sliders = Slider::join('language', 'language.id', '=', 'slider.language_id')
            ->join('slider_album', 'slider_album.id', '=', 'slider.slider_album_id')
            ->select(array('slider.name','slider_album.name as category', 'language.name as language', 'slider.created_at'))
            ->orderBy('slider.position', 'ASC');

        return Datatables::of($sliders)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/slider/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                    <a href="{{{ URL::to(\'admin/slider/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
