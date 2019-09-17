<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use App\User;
use Laramaster\Nuclues\Models\Sliders;
use Auth;

class Slider 
{
	public static function get($latest='',$count='')
	{
		if ($latest == 'latest' && $count != null) {
			$latestwidget = Sliders::latest()->take($count)->get();
			return $latestwidget;
		}elseif ($latest == 'oldest' && $count != null) {
			$oldestwidget = Sliders::take($count)->get();
			return $oldestwidget;
		}elseif ($latest == 'latest' && $count == '') {
			$latest = Sliders::latest()->get();
			return $latest;
		}elseif ($latest == 'oldest' && $count == '') {
			$oldest = Sliders::all();
			return $oldest;
		}
		else{
			$widget = Sliders::all();
			return $widget;
		}
		
	}
}
