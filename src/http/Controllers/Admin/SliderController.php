<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Sliders;
use Laramaster\Nuclues\Models\Productimage;
use Carbon\Carbon;


class SliderController extends Controller
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
        $sliders = Sliders::latest()->paginate(10);
        return view('nuclues::admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuclues::admin.slider.create');
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
           'title' => 'required|unique:sliders',
            'image' => 'required|mimes:jpg,png,jpeg',
            'button' => 'required',
            'description' => 'required',
            'button_link' => 'required'
        ]);


          $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('slider')) {
                    mkdir('slider', '0777', true);
                }
               
                $path = public_path() . '/slider/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = "default.png";
         }

        $slider = new Sliders();
        $slider->title = $request->title;
        $slider->image = $imagename;
        $slider->button = $request->button;
        $slider->button_link = $request->button_link;
        $slider->description = $request->description;
        $slider->save();

        return redirect()->route('slider.index')->with('status','Slider created');
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
        $slider = Sliders::where('id',$slug)->first();
        return view('nuclues::admin.slider.edit',compact('slider'));
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
           'title' => 'required|unique:sliders,title,'.$id,
            'button' => 'required',
            'description' => 'required',
            'button_link' => 'required'
        ]);

           $slider = Sliders::find($id);

          $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('slider')) {
                    mkdir('slider', '0777', true);
                }
                 if (file_exists('slider')) {
                	unlink('slider/'.$slider->image);
                }
                $path = public_path() . '/slider/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = $slider->image;
         }

      
       	$slider->title = $request->title;
        $slider->image = $imagename;
        $slider->button = $request->button;
        $slider->button_link = $request->button_link;
        $slider->description = $request->description;
        $slider->save();

        return redirect()->route('slider.index')->with('status','Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $category = Sliders::where('id',$slug)->first()->delete();

         return back()->with('status','Slider Deleted');
    }

  
}