<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Blogs;
use Laramaster\Nuclues\Models\Blogcategories;
use Carbon\Carbon;
use Laramaster\Nuclues\Admin;

class BlogController extends Controller
{
   public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
    
	public function index()
	{
		$blogs = Blogs::latest()->paginate(10);
		if (Admin::is()) {
      return view('nuclues::admin.blog.index',compact('blogs'));
    }else{
      return redirect()->route('login');
    }

	}

	public function create()
	{
		$blogcategories = Blogcategories::latest()->get();
		if (Admin::is()) {
       return view('nuclues::admin.blog.create',compact('blogcategories'));
    }else{
      return redirect()->route('login');
    }

	}

	public function store(Request $request)
	{
		  $this->validate($request,[
           'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
            'description' => 'nullable',
            'user' => 'nullable',
            'category' => 'required',
            'slug' => 'required|unique:blogs'
        ]);


         $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('blog')) {
                    mkdir('blog', '0777', true);
                }
                $path = public_path() . '/blog/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = "default.png";
         }

       $blog = new Blogs();
       $blog->title = $request->title;
       $blog->image = $imagename;
       $blog->description = $request->description;
       $blog->blogcategories_id = $request->category;
       $blog->slug = $request->slug;
       $blog->user = $request->user;
       $blog->save();
       if (Admin::is()) {
      return redirect()->route('blog.index');
    }else{
      return redirect()->route('login');
    }



	}

	public function edit($slug)
	{
		$blogcategories = Blogcategories::latest()->get();
		$blog = Blogs::where('slug',$slug)->first();
        if (Admin::is()) {
      return view('nuclues::admin.blog.edit',compact('blog','blogcategories'));
    }else{
      return redirect()->route('login');
    }

	}

	public function update(Request $request,$id)
	{
		   $this->validate($request,[
           'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp',
            'description' => 'nullable',
            'user' => 'nullable',
            'category' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$id
        ]);

		 $blog = Blogs::find($id);

         $file = $request->file('image');
         if (isset($file)) {
         	 $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('blog')) {
                    mkdir('blog', '0777', true);
                }
                 if (file_exists('blog')) {
                  unlink('blog/'.$blog->image);
                }
                $path = public_path() . '/blog/';
              
                $file->move($path, $imagename);
         }else{
         	$imagename = $blog->image;
         }

     
       $blog->title = $request->title;
       $blog->image = $imagename;
       $blog->description = $request->description;
       $blog->blogcategories_id = $request->category;
       $blog->slug = $request->slug;
       $blog->user = $request->user;
       $blog->save();
       if (Admin::is()) {
       return redirect()->route('blog.index');
    }else{
      return redirect()->route('login');
    }

	}

	public function delete($slug)
	{
		$category = Blogs::where('slug',$slug)->first()->delete();

         if (Admin::is()) {
      return back()->with('status','Blogs Deleted');
    }else{
      return redirect()->route('login');
    }

	}
}
