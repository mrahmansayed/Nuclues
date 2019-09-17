<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Models\Contacts;

class CustomerController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index()
	{
		$customers = User::latest()->paginate(10);
		return view('nuclues::admin.customer.index',compact('customers'));
	}

	public function delete($id)
	{
		User::find($id)->delete();

		return back()->with('status','Customer Deleted');

	}
}
