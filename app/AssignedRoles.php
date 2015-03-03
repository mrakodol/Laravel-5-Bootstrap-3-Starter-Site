<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedRoles extends Model {
    protected $guarded = array();

    public static $rules = array();
	
	protected $table = 'assigned_roles';


}