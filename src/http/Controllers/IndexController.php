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



class IndexController extends Controller
{

	public function __construct()
    {
    	$this->middleware('web');

    }
	public function index()
	{	
		$currency = Session()->get('currency');
		
		// Coupon::add('abc');

		$new_products = Product::latest()->get();
		return view('nuclues::index',[
			'new_products' => $new_products,
			
		]);
	}

	public function contact()
	{
		return view('nuclues::contact');
	}

	public function store(Request $request)
	{
		Contact::add($request->customerName,$request->customerEmail,$request->contactSubject,$request->contactMessage);

		return back();
	}

	public function subscriber(Request $request)
	{
		Subscriber::add($request->email);

		return back();
	}

	public function stripe(Request $request)
	{
		 try {
            $charge = Stripe::charges()->create([
                'amount' => 100,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => 'admin@gmail.com',
                'metadata' => [

                ],
            ]);

            return redirect()->back()->with('status', 'Thank you! Your payment has been successfully accepted!');
        } catch (Exception $e) {


        }
	}

	


}