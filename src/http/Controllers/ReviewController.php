<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use Laramaster\Nuclues\Models\Product;
use Laramaster\Nuclues\Models\Carts;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Cart;
use Laramaster\Nuclues\Review;



class ReviewController extends Controller
{
	public function store(Request $request)
	{
		$data = [
			'product_id' => $request->product_id,
			'name' => $request->name,
			'email' => $request->email,
			'rating' => $request->rating,
			'review' => $request->review,
		];
		Review::add($data);

		return back();
	}
}