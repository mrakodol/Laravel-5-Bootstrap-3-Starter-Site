<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\AssignedRoles as IsAdminRoles;
use View;

class BaseController extends Controller {

    /**
     * Initializer.
     *
     * @access   public
     * @return \BaseController
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
		
		$user = Auth::id();
		if($user>0){
			$result = IsAdminRoles::join('permission_role','assigned_roles.role_id','=','permission_role.role_id')
											->join('permissions','permissions.id','=','permission_role.permission_id')
											->where('assigned_roles.user_id',$user)
											->select('name')
											->get();
			foreach ($result as $row)
			{
				View::share($row->name,  $row->name);
			}
			$count = IsAdminRoles::join('permission_role','assigned_roles.role_id','=','permission_role.role_id')
											->join('permissions','permissions.id','=','permission_role.permission_id')
											->where('assigned_roles.user_id',$user)
											->where('permissions.is_admin','1')
											->count();
			if($count>0)
			{
				View::share('admin',  'admin');
			}
		}	
		
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}