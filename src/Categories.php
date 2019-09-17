<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Category;
use Auth;

class Categories 
{
	public static function get($latest='',$quantity=null)
	{
		if ($latest == 'latest' && $quantity != null) {
			$latestcategory = Category::latest()->take($quantity)->get();
			return $latestcategory;
		}elseif ($latest == 'oldest' && $latest != null) {
			$oldestcategory = Category::take($quantity)->get();
			return $oldestcategory;
		}
		else{
			$category = Category::all();
			return $category;
		}
	}
}
