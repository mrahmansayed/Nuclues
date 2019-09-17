<?php 

namespace Laramaster\Nuclues;
use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Product;
use App\User;
use Auth;
/**
 * 
 */
class Cart 
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
		if (!$product->quantity == 0) {
			$product_title = $product->title;

			 $cart = Carts::where([
			    ['session_id', Session()->get('session_id')],
			    ['product_id', $product->id],
			])->get();

			if ($cart->count() == 0) {
				$cart = new Carts();
				$cart->session_id = Session()->get('session_id');
				$cart->product_id = $id;
				
				if ($name == '') {
					$cart->title = $product_title;
				}else{
					$cart->title = $name;
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

				  $carts = Carts::where([
			    	['session_id', Session()->get('session_id')],
			    	['product_id', $product->id],
				])->first();
				$cart = Carts::find($carts->id);
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

				$cart_total = Carts::find($cart->id);
				$cart->total = $cart->price * $cart->qty;
				$cart->save();
			}

		}
		
	}

	public static function get()
	{
		if (!Session()->get('currency')) {
			Carts::where('created_at', '<', Carbon::now()->subHours(12))->delete();
			$carts = Carts::where([
			    ['session_id', Session()->get('session_id')]
			])->get();

			

			if ($carts->count() > 0) {
				foreach ($carts as $key => $value) {
					$cart[] = [
						'price' => Currencies::symbol().number_format($value->price,2),
						'image' => $value->image,
						'title' => $value->title,
						'qty' => $value->qty,
						'total' => Currencies::symbol().number_format($value->price * $value->qty,2),
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
			Carts::where('created_at', '<', Carbon::now()->subHours(12))->delete();
			$carts = Carts::where([
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
		$currency = Session()->get('currency');
		if ($currency) {
			$cart_total = 0;
			$carts = Carts::where('session_id',Session()->get('session_id'))->get();
			foreach ($carts as $key => $value) {
				if ($value->discount == null) {
					$discount = $value->discount / 100;
					$discount_price = $value->price - $discount;
				}
				$qty_price = $discount_price * $value->qty;
				$price = $qty_price * $currency['exchange_rate'];
				$totals = $cart_total += $price;
				$rate = Session::get('coupon')['discount'] * $currency['exchange_rate'];
				$total = $totals - $rate;

			}
		}else{
			$cart_total = 0;
			$carts = Carts::where('session_id',Session()->get('session_id'))->get();
			foreach ($carts as $key => $value) {
				if ($value->discount == null) {
					$discount = $value->discount / 100;
					$discount_price = $value->price - $discount;
				}
				$price = $discount_price * $value->qty;
				$totals = $cart_total += $price;

				$total = $totals - Session::get('coupon')['discount'];
			}
		}
		$cart_exists = Carts::where('session_id',Session()->get('session_id'))->exists();
		if ($cart_exists) {
			return Currencies::symbol().number_format($total,2);
		}else{
			return "0.00";
		}
		
		
	}


	public static function subtotal()
	{
		$currency = Session()->get('currency');
		if ($currency) {
			$cart_total = 0;
			$carts = Carts::where('session_id',Session()->get('session_id'))->get();
			foreach ($carts as $key => $value) {
				if ($value->discount == null) {
					$discount = $value->discount / 100;
					$discount_price = $value->price - $discount;
				}
				$qty_price = $discount_price * $value->qty;
				$price = $qty_price * $currency['exchange_rate'];
				$total = $cart_total += $price;
				

			}
		}else{
			$cart_total = 0;
			$carts = Carts::where('session_id',Session()->get('session_id'))->get();
			foreach ($carts as $key => $value) {
				if ($value->discount == null) {
					$discount = $value->discount / 100;
					$discount_price = $value->price - $discount;
				}
				$price = $discount_price * $value->qty;
				$total = $cart_total += $price;

				
			}
		}
		$cart_exists = Carts::where('session_id',Session()->get('session_id'))->exists();
		if ($cart_exists) {
			return Currencies::symbol().number_format($total,2);
		}else{
			return "0.00";
		}
		
		
	}


	public static function count()
	{
		
		$count = Carts::where('session_id',Session()->get('session_id'))->sum('qty');
		return $count;
	}

	public static function remove($id)
	{
		$cart = Carts::find($id)->delete();

	}

	public static function update($id,$value)
	{
		$cart = Carts::find($id);
		$product = Product::where('id',$cart->product_id)->first();
		$cart->session_id = Session()->get('session_id');
		$cart->product_id = $product->id;
		$cart->title = $product->title;
		$cart->qty = $value;
		if ($product->discount) {
			$discount = $product->discount / 100;
			$product_discount = $discount * $product->price;
			$cart->price = $product->price - $product_discount;
		}else{
			$cart->price = $product->price;
		}
		$cart->image = $product->image;
		$cart->save();

		$cart_total = Carts::find($cart->id);
		$cart->total = $cart->price * $cart->qty;
		$cart->save();
		$total = Carts::where('session_id',Session()->get('session_id'))->sum('total');
		$count = Carts::where('session_id',Session()->get('session_id'))->sum('qty');
		return [
			'totalPrice' => Currencies::symbol().number_format($total,2),
			'price' => Currencies::symbol().number_format($cart->total,2),
			'cart_count' => $count,
		];
	}

	public static function has()
	{
		$cart = Carts::where('session_id',Session()->get('session_id'))->exists();

		return $cart;
	}

	public static function destroy()
	{
		$carts = Carts::where('session_id',Session()->get('session_id'))->get();

		foreach ($carts as $key => $value) {
			$value->delete();
		}
	}

	



}