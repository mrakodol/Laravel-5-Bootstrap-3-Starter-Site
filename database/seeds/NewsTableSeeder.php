<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('news')->delete();
		
		$introduction = "Cras egestas non arcu quis facilisis. Etiam scelerisque felis a ante 
		vehicula dignissim. Nunc nulla erat, placerat in ipsum efficitur, efficitur volutpat enim. 
		In nec lobortis sapien. Maecenas quis nunc molestie, ultrices magna nec, cursus risus. 
		Fusce viverra urna at blandit dignissim. Duis id porta augue, vel tempor enim. Ut eu orci dolor. ";
		
		$introduction1 = "Duis posuere cursus arcu, consectetur tincidunt turpis vulputate eu. 
		Integer venenatis consequat turpis sit amet bibendum. Nulla nibh ex, semper nec sem sed, consectetur 
		tincidunt metus. Aliquam mollis condimentum magna id tincidunt. Suspendisse pellentesque placerat 
		accumsan. Sed a turpis lacus. Donec luctus lorem a turpis scelerisque tincidunt. Etiam at tellus 
		sed erat elementum dictum. In sit amet nulla mattis, placerat erat non, vehicula metus. Morbi nulla 
		sapien, sollicitudin non vulputate et, sodales in nisi. Donec sapien dolor, tincidunt sed ultricies 
		in, ultrices sit amet ante. ";
		
		$content = "Quisque congue sed mauris sit amet fringilla. Pellentesque a justo mollis, 
		laoreet felis vehicula, elementum urna. Proin a nisl nec lorem mollis malesuada. Suspendisse sollicitudin 
		volutpat elementum. Mauris luctus egestas justo, nec tincidunt est luctus a. Aenean a convallis sem. 
		Aenean quis lorem efficitur, rutrum libero eu, efficitur nunc. Praesent eu metus pellentesque, mollis 
		dui eget, interdum elit. Nulla tempus tristique eros, ut mattis leo sagittis at. Curabitur rutrum tellus 
		eu ex egestas, et dapibus lacus sodales. Maecenas facilisis tortor vitae neque vehicula, feugiat commodo 
		nulla pulvinar. Maecenas porttitor mauris enim, sed condimentum enim varius vel. Nulla dapibus velit a 
		luctus malesuada. Nam eleifend felis et porta semper. Proin blandit sem augue, in venenatis augue ultricies 
		vitae. Nulla eu purus tellus.\n\rCras tempus mauris sed arcu euismod, eget ultrices nisi lobortis. Etiam 
		tincidunt erat nunc, ut pretium turpis mollis et. Fusce feugiat, lectus id imperdiet rutrum, justo urna 
		finibus libero, eget dignissim erat lorem sed neque. Curabitur non nisl facilisis, venenatis risus vel, 
		commodo augue. Cras eget nisl dictum, sodales turpis eu, blandit lectus. Duis mattis est ac mi pretium 
		tristique vitae non magna. Aenean dictum quis neque a volutpat. Integer convallis purus in enim tempor 
		pretium. Sed sit amet diam et purus porta luctus. Sed pretium, lorem ut sodales maximus, nisl arcu 
		tristique odio, nec posuere mauris metus ac justo. Pellentesque ut volutpat purus. Nulla vel ornare libero. 
		Sed metus massa, blandit eu lorem eu, finibus ornare arcu. Proin sagittis eu turpis sit amet scelerisque. 
		Phasellus nec libero eu ipsum congue consectetur. Quisque id mattis nisl, ac porta sapien. Nulla lobortis,
		turpis at scelerisque finibus, augue neque laoreet diam, in facilisis lacus purus at libero. Ut libero 
		sapien, laoreet nec lorem suscipit, efficitur tincidunt elit. Quisque mi libero, volutpat eu convallis nec, 
		semper at nulla. Sed hendrerit rhoncus nulla sit amet vestibulum. Vestibulum ante ipsum primis in faucibus 
		orci luctus et ultrices posuere cubilia Curae; Suspendisse diam neque, dignissim non metus maximus, 
		suscipit faucibus magna. Aenean sodales elit enim, eu laoreet dui vulputate ac. Donec sagittis dignissim 
		tortor, vitae dignissim dolor ultricies eu. Vivamus rutrum vestibulum auctor. Aliquam eu orci ligula. 
		Quisque at ligula ex. Suspendisse in ante eget turpis sollicitudin lobortis tincidunt sed nibh. Phasellus 
		elementum nibh vitae rutrum porta. Pellentesque vitae vestibulum purus. Curabitur placerat mattis tempor.";
		
		$news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "Cras egestas non arcu quis facilisis";
		$news->introduction = $introduction;
		$news->content = $content;
        $news->save();
        
        $news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "Fusce vel turpis ultricies";
		$news->introduction = $introduction1;
		$news->content = $content;
        $news->save();
        
        $news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "Donec ligula sem, facilisis ac tristique et, imperdiet nec nisi";
		$news->introduction = $introduction;
		$news->content = $content;
        $news->save();
	}

}
