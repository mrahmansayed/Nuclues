<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Coupons;
use Laramaster\Nuclues\Models\Carts;
/**
 * 
 */
class Coupon 
{
	

	public function __construct()
	{
		$this->middleware('web');
	}


	public static function add($code)
	{
		
		$coupon = Coupons::where('code',$code)->first();

		$session_id = Session::get('session_id');

		$carts = Carts::where('session_id',$session_id)->get();

		$price = $carts->sum('price');

        session()->put('coupon',[
            'name' => $coupon->code,
            'discount' => $coupon->discount($price),
        ]);
	}


	public static function get()
	{
		$coupon = Session::get('coupon');


		$currency = Session()->get('currency');
		if ($currency) {
			$discount = $coupon['discount'] * $currency['exchange_rate'];
			
			
		}else
		{
			$discount = $coupon['discount'];
			
		}
		$couponget = Coupons::where('code',$coupon['name'])->first();
		if ($couponget) {
			if ($couponget->type == 'fixed') {
				
			$percent = '$'.$couponget->value;
		}else{
			
			$percent = $couponget->percent_off.'%';
		}
		}else{
			$percent = 0;
		}


		

		return ([
			'name' => $coupon['name'],
			'discount' => '-'.Currencies::symbol().number_format($discount,2),
			'percent' => $percent,
		]);
	}


	public static function check($code)
	{
		$coupon = Coupons::where('code',$code)->first();

		return $coupon;

	}

	public static function has()
	{
		$coupon = Coupons::where('code',Session::get('coupon')['name'])->first();

		return $coupon;
	}

	public static function delete()
	{
		session()->forget('coupon');
	}
}