<?php 

namespace Laramaster\Nuclues;
use Laramaster\Nuclues\Models\Wishlists;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Product;
/**
 * 
 */
class Wishlist 
{
	
	public function __construct()
	{
		$this->middleware('web');
	}

	public static function add($id,$name='',$price='',$quantity='')
	{

		$session = Session::getId();
		Session::put('session_id',$session);
		
		$product = Product::find($id);

		$product_title = $product->title;

		 $cart = Wishlists::where([
		    ['session_id', Session()->get('session_id')],
		    ['product_id', $product->id],
		])->get();

		if ($cart->count() == 0) {
			$cart = new Wishlists();
			$cart->session_id = Session()->get('session_id');
			$cart->product_id = $id;
			
			if ($name == '') {
				$cart->title = $product_title;
			}else{
				$cart->title = $product_title;
			}
			
			
			if ($quantity == '') {
				$cart->qty = 1;
			}else{
				$cart->qty = $quantity;
			}
			if ($quantity == '') {
				$quan = 1;
			}else{
				$quan = $quantity;
			}
				if ($price == '') {
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$cart->price = $product->price - $discount_price;
				}else{
					$cart->price = $product->price;
				}
			}else{
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$cart->price = $product->price - $discount_price;
				}else{
					$cart->price = $product->price;
				}
			}
			if ($price == '') {
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$product_total_price = $product->price - $discount_price;
					$cart->total = $product_total_price * $quan;
				}else{
					$cart->total = $product->price * $quan;
				}
				
			}else{
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$product_total_price = $product->price - $discount_price;
					$cart->total = $product_total_price * $quan;
				}else{
					$cart->total = $product->price * $quan;
				}
			}
			
			$cart->image = $product->image;
			$cart->save();
			

		}else{

			  $carts = Wishlists::where([
		    	['session_id', Session()->get('session_id')],
		    	['product_id', $product->id],
			])->first();
			$cart = Wishlists::find($carts->id);
			$cart->session_id = Session()->get('session_id');
			$cart->product_id = $id;
			if ($name == '') {
				$cart->title = $product->title;
			}else{
				$cart->title = $name;
			}
			if ($quantity == '') {
				$cart->increment('qty');
			}else{
				$cart->qty = $cart->qty + $quantity;
			}
				if ($price == '') {
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$cart->price = $product->price - $discount_price;
				}else{
					$cart->price = $product->price;
				}
			}else{
				if ($product->discount != null) {
					$discount = $product->discount / 100;
					$discount_price = $discount * $product->price;
					$cart->price = $product->price - $discount_price;
				}else{
					$cart->price = $product->price;
				}
			}
			$cart->image = $product->image;
			$cart->save();

			$cart_total = Wishlists::find($cart->id);
			$cart->total = $cart->price * $cart->qty;
			$cart->save();
		}
		
	}

	public static function get()
	{
		if (!Session()->get('currency')) {
			Wishlists::where('created_at', '<', Carbon::now()->subHours(12))->delete();
			$carts = Wishlists::where([
			    ['session_id', Session()->get('session_id')]
			])->get();

			

			if ($carts->count() > 0) {
				foreach ($carts as $key => $value) {
					$cart[] = [
						'price' => $value->price,
						'image' => $value->image,
						'title' => $value->title,
						'qty' => $value->qty,
						'total' => $value->price * $value->qty,
						'id' => $value->id,
						'product_id' => $value->product_id,
					];
				}
			}else{
				$cart[] = [
				'price' => null,
				'image' => null,
				'title' => null,
				'qty' => null,
				'total' => null,
				'id' => null,
				'product_id' => null,
			];
			}

			
		}else{
			
			$carts = Wishlists::where([
			    ['session_id', Session()->get('session_id')]
			])->get();
			$currency = Session()->get('currency');
			if ($carts->count() > 0) {
				foreach ($carts as $key => $value) {

					$cart[] = [
						'price' => Currencies::symbol().number_format($value->price * $currency['exchange_rate'],2),
						'image' => $value->image,
						'title' => $value->title,
						'qty' => $value->qty,
						'total' => Currencies::symbol().number_format(($value->price * $currency['exchange_rate']) * $value->qty,2),
						'id' => $value->id,
						'product_id' => $value->product_id,
					];
				}
			
			}else{
				$cart[] = [
				'price' => null,
				'image' => null,
				'title' => null,
				'qty' => null,
				'total' => null,
				'id' => null,
				'product_id' => null,
			];
			}
		}
		
		
		return $cart;
	}

	public static function total()
	{
		
		$total = Wishlists::where('session_id',Session()->get('session_id'))->sum('total');
		return $total;
	}


	public static function count()
	{
		
		$count = Wishlists::where('session_id',Session()->get('session_id'))->sum('qty');
		return $count;
	}

	public static function remove($id)
	{
		$cart = Wishlists::find($id)->delete();

	}


	public static function has()
	{
		$cart = Wishlists::where('session_id',Session()->get('session_id'))->exists();

		return $cart;
	}


}