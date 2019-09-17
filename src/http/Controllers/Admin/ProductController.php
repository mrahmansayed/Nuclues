<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Category;
use Laramaster\Nuclues\Models\Productimage;
use Laramaster\Nuclues\Models\subcategory;
use Carbon\Carbon;

class ProductController extends Controller
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
        $products = Product::latest()->paginate(10);
        return view('nuclues::admin.product.index',compact('products'));
    }

    public function like(Request $request,$id)
    {
        $product = Product::find($id);
        $product->like = 1;
        $product->save();

        return back()->with('status','Product added Featured');
    }


      public function dislike(Request $request,$id)
    {
        $product = Product::find($id);
        $product->like = 0;
        $product->save();

        return back()->with('status','Product added Featured');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::latest()->get();
        return view('nuclues::admin.product.create',compact('categories'));
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
            'product_type' => 'nullable',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
            'quantity' => 'required',
            'description' => 'nullable',
            'information' => 'nullable',
            'vendor' => 'nullable',
            'compare_price' => 'nullable',
            'category' => 'required',
            'price' => 'required',
            'subcategory' => 'required',
            'subtitle' => 'required|unique:products',

        ]);


         $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('product')) {
                    mkdir('product', '0777', true);
                }
                $path = public_path() . '/product/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = "default.png";
         }

       $product = new Product();
       $product->title = $request->title;
       $product->product_type = $request->product_type;
       $product->image = $imagename;
       $product->discount = $request->discount;
       $product->quantity = $request->quantity;
      $product->subcategory_id = $request->subcategory;
       $product->description = $request->description;
       $product->information = $request->information;
       $product->del_price = $request->compare_price;
       $product->category_id = $request->category;
       $product->price = $request->price;
       $product->subtitle = $request->subtitle;
       $product->vendor = $request->vendor;
       $product->save();

       if ($request->file('productimages') > 0) {
          foreach ($request->productimages as $image) {
                $curentdate = Carbon::now()->toDateString();
                $imagenames = $product->subtitle . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!file_exists('product/gallary')) {
                    mkdir('product/gallary', '0777', true);
                }
                $image->move('product/gallary', $imagenames);
                $product_image = new Productimage();
                $product_image->product_id = $product->id;
                $product_image->image = $imagenames;
                $product_image->save();
                 
            }
       }

       return redirect()->route('product.index');
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
      $product = Product::where('subtitle',$slug)->first();
      $subcategory = Subcategory::where('id',$product->subcategory_id)->get();
    	$categories = Category::latest()->get();
        
        return view('nuclues::admin.product.edit',compact('product','categories','subcategory'));
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
            'product_type' => 'nullable',
            'image' => 'image|mimes:jpeg,jpg,png,webp',
            'quantity' => 'required',
            'description' => 'nullable',
            'information' => 'nullable',
            'vendor' => 'nullable',
            'compare_price' => 'nullable',
            'category' => 'required',
            'price' => 'required',
            'subtitle' => 'required|unique:products,subtitle,'.$id,

        ]);

         $product = Product::find($id);

         $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('product')) {
                    mkdir('product', '0777', true);
                }
                if (file_exists('product')) {
                	unlink('product/'.$product->image);
                }
                $path = public_path() . '/product/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = $product->image;
         }

       
       $product->title = $request->title;
       $product->product_type = $request->product_type;
       $product->image = $imagename;
       $product->discount = $request->discount;
       $product->subcategory_id = $request->subcategory;
       $product->quantity = $request->quantity;
       $product->description = $request->description;
       $product->information = $request->information;
       $product->del_price = $request->compare_price;
       $product->category_id = $request->category;
       $product->price = $request->price;
       $product->subtitle = $request->subtitle;
       $product->vendor = $request->vendor;
       $product->save();




       if ($request->file('productimages') > 0) {

        $productimage_check = Productimage::where('product_id',$product->id)->get();
        foreach($productimage_check as $image)
        {

            if (file_exists('product/gallary')) {
                  unlink('product/gallary/'.$image->image);
                }

                $image->delete();
          
        }
          foreach ($request->productimages as $image) {
            $productid = Product::where('id',$product->id)->first();
                $curentdate = Carbon::now()->toDateString();
                $imagenames = $product->subtitle . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!file_exists('product/gallary')) {
                    mkdir('product/gallary', '0777', true);
                }
                $image->move('product/gallary', $imagenames);
                $product_images =  new Productimage();
              
                $product_images->product_id = $id;
                $product_images->image = $imagenames;
                $product_images->save();
                
                
                 
            }
        }
       

       return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $product = Product::where('subtitle',$slug)->first();
           if (file_exists('product')) {
                	unlink('product/'.$product->image);
                }
         
        $productimage_check = Productimage::where('product_id',$product->id)->get();
        foreach($productimage_check as $image)
        {

            if (file_exists('product/gallary')) {
                  unlink('product/gallary/'.$image->image);
                }

                $image->delete();
          
        }
          $product->delete();

          return back();

    }
}