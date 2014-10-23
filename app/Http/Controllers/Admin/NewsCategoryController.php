<?php namespace App\Http\Controllers\Admin;

use App\NewsCategory;
use App\Language;
use App\Http\Controllers\AdminController;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\NewsCategoryRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;


class NewsCategoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Show the page
        return view('admin.newscategory.index');
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
        return view('admin.newscategory.create_edit', compact('languages','language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(NewsCategoryRequest $request)
    {
        $newscategory = new NewsCategory();
        $newscategory -> user_id = Auth::id();
        $newscategory -> language_id = $request->language_id;
        $newscategory -> title = $request->title;
        $newscategory -> save();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $newscategory = NewsCategory::find($id);
        $language = $newscategory->language_id;
        $languages = Language::all();

        return view('admin.newscategory.create_edit',compact('newscategory','languages','language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(NewsCategoryRequest $request, $id)
    {
        $newscategory = NewsCategory::find($id);
        $newscategory -> user_id_edited = Auth::id();
        $newscategory -> language_id = $request->language_id;
        $newscategory -> title = $request->title;
        $newscategory -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $newscategory = NewsCategory::find($id);
        // Show the page
        return view('admin.newscategory.delete', compact('newscategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $newscategory = NewsCategory::find($id);
        $newscategory->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $news_category = NewsCategory::join('language', 'language.id', '=', 'news_category.language_id')
            ->select(array('news_category.id','news_category.title', 'language.name', 'news_category.created_at'))
            ->orderBy('news_category.position', 'ASC');

        return Datatables::of($news_category)
           ->add_column('actions', '<a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
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
                NewsCategory::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
