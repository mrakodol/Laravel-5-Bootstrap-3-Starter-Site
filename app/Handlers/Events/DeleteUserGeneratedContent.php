<?php namespace App\Handlers\Events;

use App\Events\UserWasDeleted;

use App\Article;
use App\Photo;
use App\PhotoAlbum;
use App\Video;
use App\VideoAlbum;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class DeleteUserGeneratedContent implements ShouldBeQueued {
	
	use InteractsWithQueue;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasDeleted  $event
	 * @return void
	 */
	public function handle(UserWasDeleted $event)
	{
		// Delete everything the user created
		Article::where('user_id', $event->user_id)->delete();
		Photo::where('user_id', $event->user_id)->delete();
		PhotoAlbum::where('user_id', $event->user_id)->delete();
		Video::where('user_id', $event->user_id)->delete();
		VideoAlbum::where('user_id', $event->user_id)->delete();
	}

}
