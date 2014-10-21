<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Language;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\LanguageRequest;
use Illuminate\Support\Facades\Auth;

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
       // Show the page
        return view('admin/language/create_edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LanguageRequest $request)
	{
        $language = new Language();
        $language -> user_id = Auth::id();
        $language -> lang_code = $request->lang_code;
        $language -> name = $request->name;

        $icon = "";
        if($request->icon)
        {
            $file = $request->icon;
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $icon = sha1($filename . time()) . '.' . $extension;
        }
        $language -> icon = $icon;
        $language -> save();

        if($request->icon)
        {
            $destinationPath = public_path() . '/images/language/'.$language->id.'/';
            Input::file('icon')->move($destinationPath, $icon);
        }
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // Title
        $title = "Edit language";

        $language = Language::find($id);

        return view('admin/language/create_edit','title','language');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(LanguageRequest $request, $id)
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

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/language/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/language/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
