<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class VideoAlbum extends Model {

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function description() {
		return nl2br($this -> description);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author() {
		return $this -> belongsTo('App\User');
	}

	/**
	 * Get the gallery's videos.
	 *
	 * @return array
	 */
	public function videos() {
		return $this -> hasMany('App\Video');
	}

    /**
     * Get the photo album's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
