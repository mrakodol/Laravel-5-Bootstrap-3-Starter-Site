<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

use App\News;
use Bllim\Datatables\Facade\Datatables;

class NewsController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Title
        $title = "News";

        // Show the page
        return view('admin.news.index', compact('title'));
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $news = News::join('language', 'language.id', '=', 'news.language_id')
            ->join('news_category', 'news_category.id', '=', 'news.newscategory_id')
            ->select(array('news.id','news.title','news_category.title as category', 'language.name', 'news.created_at'))
            ->orderBy('news.position', 'ASC');

        return Datatables::of($news)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/news/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/news/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')

            ->make();
    }
}
