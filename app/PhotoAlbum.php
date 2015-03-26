<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PhotoAlbum extends Model{

    /**
     * Deletes a gallery all
     * the associated images.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the gallery images
        $this->photos()->delete();

        // Delete the gallery
        return parent::delete();
    }

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
	 /**
     * Get the post's comments.
     *
     * @return array
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
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