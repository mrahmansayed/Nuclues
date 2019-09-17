<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Widgets;
use App\User;
use Auth;

class Widget 
{
	public static function get($latest='',$count='')
	{
		if ($latest == 'latest' && $count != null) {
			$latestwidget = Widgets::latest()->take($count)->get();
			return $latestwidget;
		}elseif ($latest == 'oldest' && $count != null) {
			$oldestwidget = Widgets::take($count)->get();
			return $oldestwidget;
		}elseif ($latest == 'latest' && $count == '') {
			$latest = Widgets::latest()->get();
			return $latest;
		}elseif ($latest == 'oldest' && $count == '') {
			$oldest = Widgets::all();
			return $oldest;
		}
		else{
			$widget = Widgets::all();
			return $widget;
		}
		
	}

	public static function byname($name)
	{
		if ($name) {
			$widget = Widgets::where('name',$name)->first();
			if ($widget) {
				return $widget;
			}else{
				return null;
			}
			
		}else{
			return null;
		}

	}
}
