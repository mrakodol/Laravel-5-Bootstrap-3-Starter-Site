<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use App\Language;
use App\Http\Requests\Admin\LanguageRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class LanguageController extends AdminController {
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Show the page
        return view('admin.language.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
       // Show the page
        return view('admin/language/create_edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(LanguageRequest $request)
	{
        $language = new Language();
        $language -> user_id = Auth::id();
        $language -> lang_code = $request->lang_code;
        $language -> name = $request->name;

        $icon = "";
        if(Input::hasFile('icon'))
        {
            $file = Input::file('icon');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $icon = sha1($filename . time()) . '.' . $extension;
        }
        $language -> icon = $icon;
        $language -> save();

        if(Input::hasFile('icon'))
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
	public function getEdit($id)
	{
        $language = Language::find($id);

        return view('admin/language/create_edit',compact('language'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(LanguageRequest $request, $id)
	{
        $language = Language::find($id);
        $language -> user_id_edited = Auth::id();
        $language -> lang_code = $request->lang_code;
        $language -> name = $request->name;
        $icon = "";

        if(Input::hasFile('icon'))
        {
            $file = Input::file('icon');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $icon = sha1($filename . time()) . '.' . $extension;
        }
        $language -> icon = $icon;
        $language -> save();

        if(Input::hasFile('icon'))
        {
            $destinationPath = public_path() . '/images/language/'.$language->id.'/';
            Input::file('icon')->move($destinationPath, $icon);
        }
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $language = $id;
        // Show the page
        return view('admin/language/delete', compact('language'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $language = Language::find($id);
        $language->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $language = Language::whereNull('languages.deleted_at')
            ->orderBy('languages.position', 'ASC')
            ->select(array('languages.id', 'languages.name', 'languages.lang_code',
            'languages.icon as icon'));
//        "<span class='flag flag-$lang_code' alt='flag'></span>"
        return Datatables::of($language)
//            ->edit_column('icon', '{!! ($icon!="")? "<img style=\"max-width: 30px; max-height: 30px;\" src=\"../images/language/$id/$icon\">":""; !!}')
            ->edit_column('icon', '{!! ($icon!="")? "<span class=\"flag $icon\" alt=\"flag\">&nbsp</span>":""; !!}')

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/language/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span> {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/language/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
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
                Language::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
