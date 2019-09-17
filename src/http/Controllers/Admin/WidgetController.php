<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\widgets;
use Laramaster\Nuclues\Models\Productimage;
use Carbon\Carbon;


class WidgetController extends Controller
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
        $widgets = widgets::latest()->paginate(10);
        return view('nuclues::admin.widget.index',compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuclues::admin.widget.create');
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
           'name' => 'required|unique:widgets',
            'description' => 'required',
        ]);

        $widget = new widgets();
        $widget->name = $request->name;
        $widget->description = $request->description;
        $widget->save();

        return redirect()->route('widget.index')->with('status','widget created');
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
        $widget = widgets::where('id',$slug)->first();
        return view('nuclues::admin.widget.edit',compact('widget'));
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
           
            'description' => 'required',
        ]);


          

        $widget = widgets::find($id);
        
        $widget->description = $request->description;
        $widget->save();

        return redirect()->route('widget.index')->with('status','widget Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $category = widgets::where('id',$slug)->first()->delete();

         return back()->with('status','widget Deleted');
    }
}