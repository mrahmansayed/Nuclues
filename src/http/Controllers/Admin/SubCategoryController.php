<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Subcategory;
use Laramaster\Nuclues\Models\Productimage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function index($id)
	{
		$SubCategory = Subcategory::where('category_id',$id)->latest()->paginate(10);
		return view('nuclues::admin.subcategory.index',compact('SubCategory','id'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required',
		]);
		

		$menu = new Subcategory();
		$menu->category_id = $request->category_id;
		$menu->name = $request->name;
		$menu->slug = Str::slug($request->name);
		$menu->save();

		return back()->with('status','Subcategory Created');

	}

	

	public function delete($id)
	{
		Subcategory::find($id)->delete();

		return back()->with('status','Menu Deleted');
	}
}