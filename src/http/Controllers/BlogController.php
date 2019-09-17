<?php

namespace Laramaster\Nuclues\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Blog;

class BlogController extends Controller
{
    public function details($slug)
    {
    	$blogdetails = Blog::details($slug);

    	return view('nuclues::blogdetails',compact('blogdetails'));
    }
}
