<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Reviews;
use Auth;

class Review 
{
	public static function add($array)
	{
		$review = new Reviews();
		$review->product_id = $array['product_id'];
		$review->name = $array['name'];
		$review->email = $array['email'];
		$review->rating = $array['rating'];
		$review->review = $array['review'];
		$review->save();

	}

	public static function get($id)
	{
		$review = Reviews::where('product_id',$id)->latest()->get();

		return $review;
	}

	public static function rating($id)
	{
		$starrating = Reviews::where('product_id',$id)->get();
		$count = Reviews::where('product_id',$id)->count();

		if (empty($count)) {
			return 0;
		}
		$starsum = $starrating->sum('rating');

		$returnstart = $starsum / $count;

		return number_format($returnstart,2);
	}

	public static function count($id)
	{
		$count = Reviews::where('product_id',$id)->count();
		if ($count) {
			return $count;
		}else{
			return 0;
		}
		
	}
}
