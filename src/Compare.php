<?php 

namespace Laramaster\Nuclues;
use Laramaster\Nuclues\Models\Compares;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Product;
/**
 * 
 */
class Compare 
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

		 $cart = Compares::where([
		    ['session_id', Session()->get('session_id')],
		    ['product_id', $product->id],
		])->get();

		if ($cart->count() == 0) {
			$cart = new Compares();
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

			  $carts = Compares::where([
		    	['session_id', Session()->get('session_id')],
		    	['product_id', $product->id],
			])->first();
			$cart = Compares::find($carts->id);
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
				$cart->qty = $quantity;
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

			$cart_total = Compares::find($cart->id);
			$cart->total = $cart->price * $cart->qty;
			$cart->save();
		}
		
	}

	public static function get()
	{
		if (!Session()->get('currency')) {
			Compares::where('created_at', '<', Carbon::now()->subHours(12))->delete();
			$carts = Compares::where([
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
			];
			}

			
		}else{
			Compares::where('created_at', '<', Carbon::now()->subHours(12))->delete();
			$carts = Compares::where([
			    ['session_id', Session()->get('session_id')]
			])->get();
			$currency = Session()->get('currency');
			if ($carts->count() > 0) {
				foreach ($carts as $key => $value) {

					$cart[] = [
						'price' => $value->price * $currency['exchange_rate'],
						'image' => $value->image,
						'title' => $value->title,
						'qty' => $value->qty,
						'total' => ($value->price * $currency['exchange_rate']) * $value->qty,
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
			$carts = Compares::where('session_id',Session()->get('session_id'))->get();
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
			$carts = Compares::where('session_id',Session()->get('session_id'))->get();
			foreach ($carts as $key => $value) {
				if ($value->discount == null) {
					$discount = $value->discount / 100;
					$discount_price = $value->price - $discount;
				}
				$price = $discount_price * $value->qty;
				$total = $cart_total += $price;
			}
		}
		$cart_exists = Compares::where('session_id',Session()->get('session_id'))->exists();
		if ($cart_exists) {
			return $total;
		}else{
			return "0";
		}
		
		
	}


	public static function count()
	{
		
		$count = Compares::where('session_id',Session()->get('session_id'))->sum('qty');
		return $count;
	}

	public static function remove($id)
	{
		$cart = Compares::find($id)->delete();

	}

	public static function update($id,$value)
	{
		$cart = Compares::find($id);
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

		$cart_total = Compares::find($cart->id);
		$cart->total = $cart->price * $cart->qty;
		$cart->save();
		$total = Compares::where('session_id',Session()->get('session_id'))->sum('total');
		$count = Compares::where('session_id',Session()->get('session_id'))->sum('qty');
		return [
			'totalPrice' => $total,
			'price' => $cart->total,
			'cart_count' => $count,
		];
	}

	public static function has()
	{
		$cart = Compares::where('session_id',Session()->get('session_id'))->exists();

		return $cart;
	}

}