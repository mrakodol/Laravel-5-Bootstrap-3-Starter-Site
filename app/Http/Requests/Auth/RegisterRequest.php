<?php namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:3',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed|min:8',
		];
	}
	/**
	 * Get the validation messages that apply to the request.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
		'email.required' => "{{Lang::get('site/user.email_required')}}",
		'email.unique' => "{{Lang::get('site/user.email_unique')}}",
		'name.required' => "{{Lang::get('site/user.name_required')}}",
		'password.required' => "{{Lang::get('site/user.password_required')}}",
		'password.confirmed' => "{{Lang::get('site/user.password_confirmed')}}",
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
