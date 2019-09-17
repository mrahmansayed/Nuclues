<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use Laramaster\Nuclues\Models\Product;

use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Laramaster\Nuclues\Contact;
use Laramaster\Nuclues\Subscriber;
use Laramaster\Nuclues\Coupon;
use Cartalyst\Stripe\Laravel\Facades\Stripe;



class CouponController extends Controller
{
	public function __construct()
    {
    	$this->middleware('web');
    }

	public function store(Request $request)
	{
		if (Coupon::check($request->code)) {
			Coupon::add($request->code);

			return back();
		}else{
			return 'no';
		}

		
	}
}