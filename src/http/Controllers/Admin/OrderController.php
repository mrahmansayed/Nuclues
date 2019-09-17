<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Orders;
use Carbon\Carbon;

class OrderController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index()
	{
		$orders = Orders::latest()->paginate(10);
		return view('nuclues::admin.order.index',compact('orders'));
	}

	public function payment_status($id)
	{
		$order = Orders::find($id);
		$order->payment_status = 0;
		$order->save();

		return back()->with('status','Payment Pending');
	}

	public function payment_approved($id)
	{
		$order = Orders::find($id);
		$order->payment_status = 1;
		$order->save();

		return back()->with('status','Payment approved');
	}

	public function delivery_status($id)
	{
		$order = Orders::find($id);
		$order->delivery_status = 'approved';
		$order->save();

		return back()->with('status','Delivery approved');
	}

	public function delivery_approved($id)
	{
		$order = Orders::find($id);
		$order->delivery_status = 'pending';
		$order->save();

		return back()->with('status','Delivery Pending');
	}

	public function delete($id)
	{
		$order = Orders::find($id);
		$order->delete();

		return back()->with('status','Order Deleted');
	}
}