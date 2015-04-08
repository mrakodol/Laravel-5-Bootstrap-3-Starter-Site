<?php namespace App\Http\Controllers\Admin;

use App\ArticleCategory;
use App\Language;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\NewsCategoryRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ArticleCategoriesController extends AdminController {

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
        $newscategory = new ArticleCategory();
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
        $newscategory = ArticleCategory::find($id);
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
        $newscategory = ArticleCategory::find($id);
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
        $newscategory = ArticleCategory::find($id);
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
        $newscategory = ArticleCategory::find($id);
        $newscategory->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $article_categories = ArticleCategory::join('languages', 'languages.id', '=', 'article_categories.language_id')
            ->select(array('article_categories.id','article_categories.title', 'languages.name', 'article_categories.created_at'))
            ->orderBy('article_categories.position', 'ASC');

        return Datatables::of($article_categories)
           ->add_column('actions', '<a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
                ArticleCategory::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
