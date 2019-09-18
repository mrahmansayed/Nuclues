<?php 

namespace Laramaster\Nuclues;
use Laramaster\Nuclues\Models\Currency;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Coupons;

/**
 * 
 */
class Currencies 
{

	public function __construct()
	{
		$this->middleware('web');
	}

	public static function get()
	{
		$currency = Currency::all();
		return $currency;
	}
	public static function add($code)
	{
		$currency = Currency::where('code',$code)->first();
		session()->put('currency',$currency);
		if (Session::get('coupon')) {
			
			$coupon = Coupons::where('code',Session::get('coupon')['name'])->first();
			Session::forget('coupon');
			if ($coupon) {
				session()->put('coupon',[
	            'name' => $coupon->code,
	            'discount' => $coupon->discount(Cart::subtotal()),
	        	]);
			}
	        
		}
		return $currency;
	}

	public static function price($price)
	{
		if (Session()->get('currency')) {
			$currency = Session()->get('currency');
			$totalPrice = $price * $currency['exchange_rate'];
			return Currencies::symbol().number_format($totalPrice,2);
		}else{
			return Currencies::symbol().number_format($price,2);
		}
		
	}

	public static function symbol()
	{
		if (Session()->get('currency')) {
			$currency = Session()->get('currency');
			$symbol = $currency['symbol'];
			return $symbol;
		}else{
			$symbol = "$";
			return $symbol;
		}
	}



	public static function codeCheck()
	{
		if (Session()->get('currency')) {
			$currency = Session()->get('currency');

			return $currency['code'];
		}else{
			$symbol = "USD";
			return $symbol;
		}
	}

	public static function type()
	{
		if (Session()->get('currency')) {
			$currency = Session()->get('currency');
			$symbol = $currency['code'];
			return $symbol;
		}else{
			$symbol = "USD";
			return $symbol;
		}
	}
}