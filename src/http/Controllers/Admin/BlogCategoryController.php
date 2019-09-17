<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Blogcategories;
use Laramaster\Nuclues\Admin;

class BlogCategoryController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
       
    }

    
    
	public function index()
	{
		$blogcategories = Blogcategories::latest()->paginate(10);

		if (Admin::is()) {
			return view('nuclues::admin.blogcategory.index',compact('blogcategories'));
		}else{
			return redirect()->route('login');
		}
		
	}

	public function create()
	{
		if (Admin::is()) {
			return view('nuclues::admin.blogcategory.create');
		}else{
			return redirect()->route('login');
		}
		
	}

	public function store(Request $request)
	{
		   $this->validate($request,[
           'name' => 'required|unique:blogcategories',
            'slug' => 'required|unique:blogcategories',
        ]);

        $category = new Blogcategories();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('blogcategory.index')->with('status','Blogcategories created');
	}

	public function edit($slug)
	{
		$blogcategory = Blogcategories::where('slug',$slug)->first();
		if (Admin::is()) {
			return view('nuclues::admin.blogcategory.edit',compact('blogcategory'));
		}else{
			return redirect()->route('login');
		}
        
	}

	public function update(Request $request,$id)
	{
		  $this->validate($request,[
           'name' => 'required|unique:blogcategories,name,'.$id,
            'slug' => 'required|unique:blogcategories,slug,'.$id,
        ]);

        $category = Blogcategories::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('blogcategory.index')->with('status','blogcategory Updated');
	}

	public function delete($slug)
	{
		$category = Blogcategories::where('slug',$slug)->first()->delete();

         return back()->with('status','Blogcategories Deleted');
	}
}
