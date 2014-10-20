<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\NewsCategory;
use Bllim\Datatables\Facade\Datatables;

class NewsCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Title
        $title = "News category";

        // Show the page
        return view('admin.newscategory.index', compact('title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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
           ->add_column('actions', '<a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                    <a href="{{{ URL::to(\'admin/newscategory/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
