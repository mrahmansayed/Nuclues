<?php

namespace Laramaster\Nuclues\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Laramaster\Nuclues\Models\Blogs;
use Laramaster\Nuclues\Models\Blogcategories;
use Laramaster\Nuclues\Models\Usersetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSettingsController extends Controller
{
	public function __construct()
    {
       $this->middleware('web');
       $this->middleware('auth');
       
    }
	

	public function edit()
	{
		return view('nuclues::admin.user.edit');
	}

	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'image' => 'required',
		]);


		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		if ($request->password) {
			$user->password = Hash::make($request->password);
		}

		$user->save();

		$userimage = Usersetting::where('user_id',$id)->first();
		if ($userimage) {
			  $file = $request->file('image');
	         if (isset($file)) {
	         	 $curentdate = Carbon::now()->toDateString();
	                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
	                if (!file_exists('profile')) {
	                    mkdir('profile', '0777', true);
	                }
	                if (file_exists('profile')) {
	                	unlink('profile/'.$userimage->image);
	                }
	                $path = public_path() . '/profile/';
	              
	                $file->move($path, $imagename);
	         }else{
	         	$imagename = $userimage->image;
	         }

	         $userimage->image = $imagename;
	         $userimage->save();
		}else{
			  $file = $request->file('image');
	         if (isset($file)) {
	         	 $curentdate = Carbon::now()->toDateString();
	                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
	                if (!file_exists('profile')) {
	                    mkdir('profile', '0777', true);
	                }
	                $path = public_path() . '/profile/';
	              
	                $file->move($path, $imagename);
	         }else{
	         	$imagename = 'default.png';
	         }
	         $userimages = new Usersetting();
	         $userimages->user_id = $id;
	         $userimages->image = $imagename;
	         $userimages->save();
		}

		return back()->with('status','User Updated');
	}
}