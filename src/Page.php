<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Pages;
use Auth;

class Page 
{
	public static function get($latest='',$quantity=null)
	{
		if ($latest == 'latest' && $quantity != null) {
			$latestcategory = Pages::latest()->take($quantity)->get();
			return $latestcategory;
		}elseif ($latest == 'oldest' && $latest != null) {
			$oldestcategory = Pages::take($quantity)->get();
			return $oldestcategory;
		}
		else{
			$category = Pages::all();
			return $category;
		}
	}

	public static function details($id)
	{
		$singleBlog = Pages::where('slug',$id)->first();

		return $singleBlog;
	}
}
