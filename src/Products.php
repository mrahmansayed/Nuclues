<?php 

namespace Laramaster\Nuclues;
use Laramaster\Nuclues\Models\Product;
/**
 * 
 */
class Products 
{
	
	public static function get($products='',$count='')
	{
		if ($products == 'latest') {
			if ($count > 0) {
				$product = Product::latest()->take($count)->get();
				return $product;
			}

			if ($count == '') {
				$product = Product::latest()->get();
				return $product;
			}
			
		}
		
		if ($products == 'featured') {
			if ($count > 0) {
				$product = Product::where('like',1)->take($count)->get();
				return $product;
			}

			if ($count == '') {
				$product = Product::where('like',1)->get();
				return $product;
			}
		}

		if ($products == 'oldest') {
			if ($count > 0) {
				$product = Product::take($count)->get();
				return $product;
			}

			if ($count == '') {
				$product = Product::all();
				return $product;
			}
		}

		if ($products == 'random') {
			if ($count > 0) {
				$product = Product::all()->random($count);
				return $product;
			}

			if ($count == '') {
				$product = Product::inRandomOrder()->get();
				return $product;
			}
		}

		if ($products == 'best_selling') {
			if ($count > 0) {
				$product = Product::orderBy('sell_count','DESC')->take($count)->get();
				return $product;
			}

			if ($count == '') {
				$product = Product::orderBy('sell_count','DESC')->get();
				return $product;
			}
		}

		if ($products == '' && $count == '') {
			$product = Product::all();
			return $product;
		}


		
	}

	public static function bycategory($category,$count='')
	{
		if ($category && $count != '') {
			$product = Product::where('category_id',$category)->take($count)->get();
			return $product;
		}
		if ($category && $count == '') {
			$product = Product::where('category_id',$category)->get();
			return $product;
		}
	}

	public static function bysubcategory($category,$count='')
	{
		if ($category && $count != '') {
			$product = Product::where('subcategory_id',$category)->take($count)->get();
			return $product;
		}
		if ($category && $count == '') {
			$product = Product::where('subcategory_id',$category)->get();
			return $product;
		}
	}

	public function bycategorycount($category)
	{
		$product = Product::where('category_id',$category)->count();
		return $product;
	}

	public function bysubcategorycount($category)
	{
		$product = Product::where('subcategory_id',$category)->count();
		return $product;
	}

	public static function details($subtitle)
	{
		$product = Product::where('subtitle',$subtitle)->first();
		return $product;
	}

	public static function pre_next($id)
	{
		  // get the current user
	    $products = Product::where('subtitle',$id)->first();

	    // get previous product id
	   $previous = Product::where('id', '<', $products->id)->max('id');
	   if ($previous != null) {
	    	 $product = Product::where('id',$previous)->first();
	    }
	    // get next product id
	    $next = Product::where('id', '>', $products->id)->min('id');
	    if ($next != null) {
	    	 $product = Product::where('id',$next)->first();
	    }

	    return $product;
	}
}