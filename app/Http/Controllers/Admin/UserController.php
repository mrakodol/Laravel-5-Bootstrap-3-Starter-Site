<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\AssignedRoles;
use App\Role;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Http\Requests\Admin\DeleteRequest;

class UserController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        $roles = Role::all();
        // Selected groups
        $selectedRoles = array();
        return view('admin.users.create_edit', compact('roles', 'selectedRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(UserRequest $request) {

        $user = new User ();
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = $request->password;
        $user -> confirmation_code = $request->password;
        $user -> confirmed = $request->confirmed;
        $user -> save();
        foreach($request->roles as $item)
        {
            $role = new AssignedRoles();
            $role -> role_id = $item;
            $role -> user_id = $user -> id;
            $role -> save();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $user = User::find($id);
        $roles = Role::all();
        $selectedRoles = AssignedRoles::where('user_id','=',$user->id)->lists('role_id');

        return view('admin.users.create_edit', compact('user', 'roles', 'selectedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(UserEditRequest $request, $id) {

        $user = User::find($id);
        $user -> name = $request->name;
        $user -> confirmed = $request->confirmed;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user -> password = $password;
                $user -> password_confirmation = $passwordConfirmation;
            }
        }
        $user -> save();
        AssignedRoles::where('user_id','=',$user->id)->delete();
        foreach($request->roles as $item)
        {
            $role = new AssignedRoles;
            $role -> role_id = $item;
            $role -> user_id = $user -> id;
            $role -> save();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function getDelete($id)
    {
        $user = User::find($id);
        // Show the page
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $user= User::find($id);
        $user->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $users = User::select(array('users.id','users.name','users.email','users.confirmed', 'users.created_at'))
            ->orderBy('users.email', 'ASC');

        return Datatables::of($users)
            -> edit_column('confirmed', '@if ($confirmed=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')

            ->make();
    }

}
