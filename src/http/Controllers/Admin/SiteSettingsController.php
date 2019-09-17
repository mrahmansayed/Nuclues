<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Blogs;
use Laramaster\Nuclues\Models\Blogcategories;
use Laramaster\Nuclues\Models\Sitesettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;

class SiteSettingsController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	public function edit()
	{
		$site = Sitesettings::latest()->take(1)->first();
		if ($site) {
			return view('nuclues::admin.user.site',compact('site'));
		}else{
			return view('nuclues::admin.user.storesite');
		}
		
	}

	public function store(Request $request)
	{

         $this->validate($request,[
           'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);


		$file = $request->file('image');
	         if (isset($file)) {
	         	 $curentdate = Carbon::now()->toDateString();
	                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
	                if (!file_exists('logo')) {
	                    mkdir('logo', '0777', true);
	                }
	                
	                $path = public_path() . '/logo/';
	              
	                $file->move($path, $imagename);
	         }else{
	         	$imagename = 'default.png';
	         }

	         

		$site = new Sitesettings();
		$site->name = $request->name;
		$site->image = $imagename;
		$site->save();

		return back();

	}

	public function update(Request $request,$id)
	{
		
         $this->validate($request,[
           'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        $site = Sitesettings::find($id);

         $file = $request->file('image');
	         if (isset($file)) {
	         	 $curentdate = Carbon::now()->toDateString();
	                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
	                if (!file_exists('logo')) {
	                    mkdir('logo', '0777', true);
	                }
	                if (file_exists('logo')) {
	                	unlink('logo/'.$site->image);
	                }
	                $path = public_path() . '/logo/';
	              
	                $file->move($path, $imagename);
	         }else{
	         	$imagename = $site->image;
	         }

	      $site->name = $request->name;
	      $site->image = $imagename;
	      $site->save();

	      return back()->with('status','Site Updated');

	}


}