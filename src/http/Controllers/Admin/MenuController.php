<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Models\Menus;
use Illuminate\Support\Str;


class MenuController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index($id)
	{
		$menus = Menus::where('navigations_id',$id)->latest()->paginate(10);
		return view('nuclues::admin.menu.index',compact('menus','id'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required|unique:menuses',
			'link' => 'required'
		]);
		

		$menu = new Menus();
		$menu->navigations_id = $request->navigations_id;
		$menu->name = $request->name;
		$menu->slug = Str::slug($request->name);
		$menu->link = $request->link;
		$menu->save();

		return back()->with('status','Menu Created');

	}

	public function edit($id)
	{
		$menu = Menus::find($id);
		return view('nuclues::admin.menu.edit',compact('menu'));
	}

	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'name' => 'required|unique:menuses,name,'.$id,
			'link' => 'required'
		]);


		$menu =  Menus::find($id);
		$menu->navigations_id = $request->navigations_id;
		$menu->name = $request->name;
		$menu->slug = Str::slug($request->name);
		$menu->link = $request->link;
		$menu->save();

		return back()->with('status','Menu Created');
	}

	public function delete($id)
	{
		Menus::find($id)->delete();

		return back()->with('status','Menu Deleted');
	}
}
