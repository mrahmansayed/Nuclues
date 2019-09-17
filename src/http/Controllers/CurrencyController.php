<?php

namespace Laramaster\Nuclues\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Currencies;



class CurrencyController extends Controller
{

	 public function __construct()
    {
    	$this->middleware('web');
    }

    public function currency(Request $request)
    {
    	

    	$code =  Currencies::code($request->value);

    	  return $code;

    	
    }

}