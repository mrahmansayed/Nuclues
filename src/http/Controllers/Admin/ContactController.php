<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Models\Contacts;

class ContactController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
    
	public function index($value='')
	{
		$contacts = Contacts::latest()->paginate(10);

		return view('nuclues::admin.contact.index',compact('contacts'));

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
		Contacts::find($id)->delete();
		return back()->with('status','Successfully deleted');
	}
}