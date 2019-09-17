<?php 

namespace Laramaster\Nuclues\http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\product;
use Laramaster\Nuclues\Products;


/**
 * 
 */
class ProductController extends controller
{
	
	function __construct()
	{
		$this->middleware('web');
	}


	public function product_show($subtitle)
	{
		$product = Products::details($subtitle);

		return view('nuclues::singleProduct',compact('product'));
	}

	public function preview_product($id)
	{
		
	  $product = Products::pre_next($id);
	 
	    return view('nuclues::singleProduct',compact('product'));
	}
}