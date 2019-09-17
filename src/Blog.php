<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Blogs;
use Laramaster\Nuclues\Models\Blogcategories;
use App\User;
use Auth;

class Blog 
{
	public static function get($latest='',$quantity=null)
	{
		if ($latest == 'latest' && $quantity != null) {
			$latestcategory = Blogs::latest()->take($quantity)->get();
			return $latestcategory;
		}elseif ($latest == 'oldest' && $latest != null) {
			$oldestcategory = Blogs::take($quantity)->get();
			return $oldestcategory;
		}
		else{
			$category = Blogs::all();
			return $category;
		}
	}


	public static function details($id)
	{
		$singleBlog = Blogs::where('slug',$id)->first();

		return $singleBlog;
	}

	public static function category($id)
	{
		$blogcategory = Blogcategories::where('id',$id)->first();

		return $blogcategory->name;
	}
}