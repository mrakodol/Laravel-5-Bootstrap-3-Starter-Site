<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/**
	 * @var array
	 */
	protected $fillable = [
		'title',
		'excerpt',
		'body',
		'published_at'
	];

	/**
	 * @var array
	 */
	protected $dates = [ 'published_at' ];


	/**
	 * @param $query
	 */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}


	/**
	 * @param $query
	 */
	public function scopeUnpublished($query)
	{
		$query->where('published_at', '>=', Carbon::now());
	}


	/**
	 * @param $date
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags(){
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
}
