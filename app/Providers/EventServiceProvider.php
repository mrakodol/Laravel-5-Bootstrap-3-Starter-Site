<?php namespace App\Providers;

use App\Events\UserWasDeleted;
use App\Handlers\Events\DeleteUserGeneratedContent;
use App\User;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
		UserWasDeleted::class => [
			DeleteUserGeneratedContent::class,
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		User::deleting(function($user)
		{
			 \Event::fire(new UserWasDeleted($user->id));
		});
	}

}
