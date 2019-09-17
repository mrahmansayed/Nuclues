<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Models\Coupons;

class CouponController extends Controller
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
        $coupons = Coupons::latest()->paginate(10);
        return view('nuclues::admin.coupon.index',compact('coupons'));
    }


    public function type(Request $request)
    {
    	return "ok";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuclues::admin.coupon.create');
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
         
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'nullable',
            'percent_off' => 'nullable',
        ]);

        $coupon = new Coupons();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        if ($request->type == 'fixed') {
        	$coupon->value = $request->value;
        }else{
        	$coupon->percent_off = $request->percent_off;        
        }
        $coupon->save();
        return redirect()->route('coupon.index')->with('status','Currency created');
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
        $coupon = Coupons::find($slug);
        return view('nuclues::admin.coupon.edit',compact('coupon'));
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
           
            'code' => 'required|unique:coupons,code,'.$id,
            'type' => 'required',
            'value' => 'nullable',
            'percent_off' => 'nullable',
        ]);

        $coupon = Coupons::find($id);
           $coupon->code = $request->code;
        $coupon->type = $request->type;
        if ($request->type == 'fixed') {
        	$coupon->value = $request->value;
        	$coupon->percent_off = null; 
        }else{
        	$coupon->percent_off = $request->percent_off; 
        	$coupon->value = null;       
        }
        $coupon->save();
        return redirect()->route('coupon.index')->with('status','Coupon Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $category = Coupons::find($slug)->delete();

         return back()->with('status','Coupons Deleted');
    }
}