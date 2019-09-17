<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Category;
use Laramaster\Nuclues\Admin;

class CategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        if (Admin::is()) {
            return view('nuclues::admin.category.index',compact('categories'));
        }else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Admin::is()) {
            return view('nuclues::admin.category.create');
        }else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
           'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('category.index')->with('status','Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
     
        $category = Category::where('slug',$slug)->first();
        if (Admin::is()) {
            return view('nuclues::admin.category.edit',compact('category'));
        }else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name' => 'required|unique:categories,name,'.$id,
            'slug' => 'required|unique:categories,slug,'.$id,
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('category.index')->with('status','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $category = Category::where('slug',$slug)->first()->delete();

         if (Admin::is()) {
            return back()->with('status','Category Deleted');
        }else{
            return redirect()->route('login');
        }
         
    }

    public function get(Request $request)
    {
        $categgory = Category::find($request->value)->subcategory;
        if (Admin::is()) {
            return view('nuclues::admin.category.subcategory',compact('categgory'));
        }else{
            return redirect()->route('login');
        }
        
    }
}
