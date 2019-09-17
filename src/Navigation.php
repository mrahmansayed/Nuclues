<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Navigations;
use Laramaster\Nuclues\Models\Menus;

/**
 * 
 */
class Navigation 
{
	public static function get($latest='',$quantity=null)
	{
		if ($latest == 'latest' && $quantity != null) {
			$latestcategory = Navigations::latest()->take($quantity)->get();
			return $latestcategory;
		}elseif ($latest == 'oldest' && $latest != null) {
			$oldestcategory = Navigations::take($quantity)->get();
			return $oldestcategory;
		}
		else{
			$category = Navigations::all();
			return $category;
		}
	}


	public static function menu($name,$quantity=null)
	{
		$navigation = Navigations::where('name',$name)->first();

		if ($quantity != null) {
			$menus = Menus::where('navigations_id',$navigation->id)->take($quantity)->get();
			return $menus;
		}else{
			$menuswith = Menus::where('navigations_id',$navigation->id)->get();
			return $menuswith;
		}
	}
}
