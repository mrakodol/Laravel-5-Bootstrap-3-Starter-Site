<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Slider extends Model {

	protected $table = "slider";
	/**
	 * Deletes a video
	 *
	 * @return bool
	 */
	public function delete() {
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content() {
		return nl2br($this -> content);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author() {
		return $this -> belongsTo('App\User', 'user_id');
	}

	/**
	 * Get the slider images.
	 *
	 * @return array
	 */
	public function slideralbum() {
		return $this -> belongsTo('App\SliderAlbum');
	}

}
