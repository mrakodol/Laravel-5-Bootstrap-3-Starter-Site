<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'name', 'username', 'email', 'password', 'confirmed' ,'confirmation_code' ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 'password', 'remember_token' ,'confirmation_code'  ];


	public function roles()
	{
		return $this->belongsToMany('App\Role')->withTimestamps();
	}


	public function hasRole($name)
	{
		foreach ($this->roles as $role)
		{
			if ( $role->name == $name )
			{
				return true;
			}
		}

		return false;
	}


	public function assignRole($role)
	{
		$this->roles()->attach($role);
	}


	public function removeRole($role)
	{
		$this->roles()->detach($role);
	}


	public function articles()
	{
		return $this->hasMany('App\Article');
	}
}
