<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Admin;

use Laramaster\Nuclues\Models\Orders;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Subscribers;
use Laramaster\Nuclues\Models\Contacts;


class DashboardController extends Controller
{
	 public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
    }

    public function index()
    {
        if (Admin::is()) {
            $total_order = Orders::count();
            $pending_order = Orders::where([
                                ['delivery_status', '=', 'pending'],
                            ])->count();
            $pending_payment = Orders::where([
                                ['payment_status', '=', '0']
                            ])->count();
            $customers = User::count();
            $orders = Orders::latest()->paginate(10);
            $pending_orders = Orders::where([
                                ['delivery_status', '=', 'pending'],
                            ])->get();
            $subscribers = Subscribers::latest()->paginate(5);
              $contacts = Contacts::latest()->paginate(5);
            return view('nuclues::admin.dashboard',compact('total_order','pending_order','pending_payment','customers','orders','pending_orders','subscribers','contacts'));
        }else{
            return redirect()->route('login');
        }

        
    }

    public function yes()
    {
    	return "yes";
    }
}
