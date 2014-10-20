<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Language;
use Bllim\Datatables\Facade\Datatables;

class LanguageController extends Controller {


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Title
        $title = "Languages";

        // Show the page
        return view('admin.language.index', compact('title'));
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
        $language = Language::
        whereNull('language.deleted_at')->select(array('language.id', 'language.name', 'language.lang_code',
            'language.icon as icon'));

        return Datatables::of($language)
            ->edit_column('icon', '{!! ($icon!="")? "<img style=\"max-width: 30px; max-height: 30px;\" src=\"../images/language/$id/$icon\">":""; !!}')

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/language/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> Izmjeni</a>
                    <a href="{{{ URL::to(\'admin/language/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Obriši</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
