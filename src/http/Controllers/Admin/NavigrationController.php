<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Navigations;
use Illuminate\Support\Str;

class NavigrationController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index()
	{
		$navigations = Navigations::latest()->paginate(10);
		return view('nuclues::admin.navigation.index',compact('navigations'));
	}

	public function create()
	{
		return view('nuclues::admin.navigation.create');
	}

	public function store(Request $request)
	{
		$this->validate($request,[
            'name' => 'required|unique:Navigations',
		]);

		$navigation = new Navigations();
		$navigation->name = $request->name;
		$navigation->slug = Str::slug($request->name);
		$navigation->save();

		return redirect()->route('navigation.index')->with('status','Navigation Created');
	}

	public function edit($id)
	{
		 $navigation = Navigations::find($id);
		return view('nuclues::admin.navigation.edit',compact('navigation'));
	}

	public function update(Request $request,$id)
	{
		$this->validate($request,[
            'name' => 'required|unique:Navigations,name,'.$id,
		]);

		$navigation = Navigations::find($id);
		$navigation->name = $request->name;
		$navigation->slug = Str::slug($request->name);
		$navigation->save();

		return redirect()->route('navigation.index')->with('status','Navigation Created');
	}

	public function delete($id)
	{
		Navigations::find($id)->delete();

		return back()->with('status','Navigation Created');
	}
}