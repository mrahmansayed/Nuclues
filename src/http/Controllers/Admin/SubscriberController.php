<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Models\Subscribers;
use Laramaster\Nuclues\Admin;

class SubscriberController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index($value='')
	{
		$subscribers = Subscribers::latest()->paginate(10);

		return view('nuclues::admin.subscriber.index',compact('subscribers'));
	}

	public function create($value='')
	{
		# code...
	}

	public function store($value='')
	{
		# code...
	}

	public function edit($value='')
	{
		# code...
	}

	public function update($value='')
	{
		# code...
	}

	public function delete($id)
	{
		Subscribers::find($id)->delete();
		return back()->with('status','Successfully deleted');
	}
}
