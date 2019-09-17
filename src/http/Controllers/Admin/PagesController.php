<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Pages;
use Carbon\Carbon;

class PagesController extends Controller
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
        $pages = Pages::latest()->paginate(10);
        return view('nuclues::admin.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuclues::admin.page.create');
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
           'title' => 'required',
            'slug' => 'required|unique:pages',
            'description' => 'required',
        ]);

        $page = new Pages();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->save();

        return redirect()->route('page.index')->with('status','page created');
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
        $page = Pages::where('slug',$slug)->first();
        return view('nuclues::admin.page.edit',compact('page'));
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
           'title' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id,
            'description' => 'required'
        ]);

        $page = Pages::find($id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->save();

        return redirect()->route('page.index')->with('status','page Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $page = Pages::where('slug',$slug)->first()->delete();

         return back()->with('status','page Deleted');
    }

   
}