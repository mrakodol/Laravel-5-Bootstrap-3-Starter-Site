<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Bllim\Datatables\Facade\Datatables;
use App\Http\Requests\Admin\RoleRequest;
use App\Http\Requests\Admin\DeleteRequest;

class RoleController extends AdminController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.roles.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        // Get all the available permissions
        $permissionsAdmin = Permission::where('is_admin','=',1)->get();
        $permissionsUser = Permission::where('is_admin','=',0)->get();
        // Selected permissions
        $permisionsadd =array();

        // Show the page
        return view('admin.roles.create_edit', compact('permissionsAdmin', 'permissionsUser','permisionsadd'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(RoleRequest $request) {

        $is_admin = 0;
        // Check if role is for admin user
        if(!empty($request->permission)){
	    	$permissionsAdmin = Permission::where('is_admin','=',1)->get();
		    foreach ($permissionsAdmin as $perm){
	            foreach($request->permission as $item){
	                if($item==$perm['id'] && $perm['is_admin']=='1')
	                {
	                    $is_admin = 1;
	                }
	            }
	        }
		}
        $role = new Role();
        $role -> is_admin = $is_admin;
        $role -> name = $request->name;
        $role -> save();
		if(is_array($request->permission)){
	        foreach ($request->permission as $item) {
	            $permission = new PermissionRole();
	            $permission->permission_id = $item;
	            $permission->role_id = $role->id;
	            $permission -> save();
	        }
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return Response
     */
    public function getEdit($id) {
        $role = Role::find($id);
        $permissionsAdmin = Permission::where('is_admin','=',1)->get();
        $permissionsUser = Permission::where('is_admin','=',0)->get();
        $permisionsadd = PermissionRole::where('role_id','=',$id)->select('permission_id')->get();

        // Show the page
        return view('admin.roles.create_edit', compact('role', 'permissionsAdmin', 'permissionsUser','permisionsadd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $role
     * @return Response
     */
    public function postEdit(RoleRequest $request, $id) {
        $is_admin = 0;
		if(!empty($request->permission)){
	        $permissionsAdmin = Permission::where('is_admin','=',1)->get();
	        foreach ($permissionsAdmin as $perm){
	            foreach($request->permission as $item){
	                if($item==$perm['id'] && $perm['is_admin']=='1')
	                {
	                    $is_admin = 1;
	                }
	            }
	        }
		}
        $role = Role::find($id);
        $role -> is_admin = $is_admin;
        $role -> name = $request->name;
        $role -> save();

        PermissionRole::where('role_id','=',$id) -> delete();
		
		if(is_array($request->permission)){
	        foreach ($request->permission as $item) {	        	
	            $permission = new PermissionRole();
	            $permission->permission_id = $item;
	            $permission->role_id = $role->id;
	            $permission -> save();
	        }
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $role
     * @return Response
     */

    public function getDelete($id)
    {
        $role = Role::find($id);
        // Show the page
        return view('admin.roles.delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $role = Role::find($id);
        $role->delete();
    }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $roles = Role::select(array('roles.id','roles.name','roles.created_at'));

        return Datatables::of($roles)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/roles/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/roles/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                ')
            ->remove_column('id')
            ->make();
    }

}
