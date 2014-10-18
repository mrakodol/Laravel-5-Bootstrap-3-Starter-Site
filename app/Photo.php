<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Photo extends Model{

	protected $table = "photo";
    /**
     * Deletes a gallery image.
     *
     * @return bool
     */
    public function delete()
    {
       // Delete the gallery image
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
     * Get the gallery for pictures.
     *
     * @return array
     */
    public function album()
    {
        return $this->belongsTo('App\PhotoAlbum');
    }
} 