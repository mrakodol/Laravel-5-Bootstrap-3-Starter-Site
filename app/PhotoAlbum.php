<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PhotoAlbum extends Model{

	protected $table = "photo_album";
    /**
     * Deletes a gallery all
     * the associated images.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the gallery images
        $this->images()->delete();

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
    public function images()
    {
        return $this->hasMany('App\Photo');
    }
} 