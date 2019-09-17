<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Wishlist;


class CartController extends Controller
{

	 public function __construct()
    {
    	$this->middleware('web');
    }

	public function getAddToCart(Request $request,$id)
	{
		$product = Product::where('id',$request->id)->first();
		
		Cart::add($id,$product->title,$product->price,$request->qty);

		return back();


		
		// return view('nuclues::index',compact('cart_total','new_products'));
	}

	public function cart()
	{
		 Session()->get('coupon')['discount']*Session()->get('currency')['exchange_rate'];
		return view('nuclues::cart');
	}

	public function remove($id)
	{ 

		Cart::remove($id);
		return redirect()->back();
	}

	public function update(Request $request)
	{
		$cart = Cart::update($request->id,$request->value);

		return $cart;
	}

	public function WishlistToCart(Request $request,$id)
	{
		Cart::add($id,$request->title,$request->price,$request->quantity);


		return back();
	}
}