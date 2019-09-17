<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Currency;

class CurrencyController extends Controller
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
        $currencies = Currency::latest()->paginate(10);
        return view('nuclues::admin.currency.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuclues::admin.currency.create');
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
           'name' => 'required|unique:currencies',
            'code' => 'required|unique:currencies',
            'symbol' => 'required|unique:currencies',
            'exchange_rate' => 'required',
        ]);

        $category = new Currency();
        $category->code = $request->code;
        $category->name = $request->name;
        $category->symbol = $request->symbol;
        $category->exchange_rate = $request->exchange_rate;
        $category->save();
        return redirect()->route('currency.index')->with('status','Currency created');
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
        $currency = Currency::where('name',$slug)->first();
        return view('nuclues::admin.currency.edit',compact('currency'));
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
           'name' => 'required|unique:currencies,name,'.$id,
            'code' => 'required|unique:currencies,code,'.$id,
            'symbol' => 'required|unique:currencies,symbol,'.$id,
            'exchange_rate' => 'required',
        ]);

        $category = Currency::find($id);
        $category->code = $request->code;
        $category->name = $request->name;
        $category->symbol = $request->symbol;
        $category->exchange_rate = $request->exchange_rate;
        $category->save();

        return redirect()->route('currency.index')->with('status','Currency Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($slug)
    {
         $category = Currency::where('name',$slug)->first()->delete();

         return back()->with('status','Currency Deleted');
    }
}
