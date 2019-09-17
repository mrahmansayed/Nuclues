<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Compare;


class CompareController extends Controller
{

	 public function __construct()
    {
    	$this->middleware('web');
    }

	public function getAddToCompare(Request $request,$id)
	{
		Compare::add($id);

		return back();

		
		// return view('nuclues::index',compact('cart_total','new_products'));
	}

	public function wishtocart(Request $request,$id)
	{
		Cart::add($id,$request->title,$request->price,$request->quantity);

		return back();
	}

	public function Compare()
	{
		return view('nuclues::Compare');
	}

	public function remove($id)
	{ 

		Compare::remove($id);
		return redirect()->back();
	}

	public function update(Request $request)
	{
		$cart = Cart::update($request->id,$request->value);

		return $cart;
		// $products = Session::has('cart') ? Session::get('cart') : null;

		// foreach ($products->items as $key => $value)
  //       {
  //           if ($value['item']['id'] == $request->id) 
  //           {   
  //           	$product_price = $value['item']['price'] * $value['qty'];
  //           	$price = $products->totalPrice - $product_price;
  //           	$qty = $products->totalQty - $value['qty']; 
  //           	$cart_sessions = Session()->get('cart');
	 //        	$cart_sessions->totalPrice = $price; 
	 //       		$cart_sessions->totalQty = $qty;
		//         Session::put('cart', $cart_sessions);
  //           }     
  //       }

		// $product = Product::find($request->id);
		// $oldCart = Session::has('cart') ? Session::get('cart') : null;

		// $cart = new Carts($oldCart);
		// $color = "red";
		// $qty = $request->value;
		// $cart->add($product, $product->id,$color,$qty);
		// session()->put('cart',$cart);

		// foreach ($cart->items as $key => $value)
  //       {
  //           if ($value['item']['id'] == $request->id) 
  //           { 
  //           	$cart_price = number_format($value['price'],2);

  //           }     
  //       }

		// return response()->json([
		// 	'totalPrice' => $cart->totalPrice,
		// 	'totalQty' => $cart->totalQty,
		// 	'price' => $cart_price,
		// ]);
	}
}