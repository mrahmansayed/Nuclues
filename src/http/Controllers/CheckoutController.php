<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Order;
use Laramaster\Nuclues\Currencies;
use Auth;


class CheckoutController extends Controller
{
	public function __construct()
    {
    	$this->middleware('web');
    	$this->middleware('auth');
    }

	public function index()
	{
		if (Cart::has()) {
			return view('nuclues::checkout');
		}else{
			return back();
		}
		
	}

	public function order(Request $request)
	{
		$data = [
			'user_id' => Auth::User()->id,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
			'country' => $request->country,
			'city' => $request->city,
			'state' => $request->state,
			'postal_code' => $request->postal_code,
			'total_amount' => Cart::total(),
			'payment_type' => "stripe",
			'currency_type' => Currencies::type(),
			'stripeToken' => $request->stripeToken,
		];
		Order::add($data);

		Cart::destroy();

		return "ok";
	}
}