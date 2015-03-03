<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;

		return false;
	}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'title'        => 'required|min:3',
			'excerpt'      => '',
			'body'         => 'required',
			'published_at' => 'required|date',
		];

		//if ( $condition )
		//{
		//	$rules['something+else'] = 'required';
		//}

		return $rules;
	}

}
