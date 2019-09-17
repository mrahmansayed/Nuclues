<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Laramaster\Nuclues\Models\Usersetting;
use Laramaster\Nuclues\Models\Sitesettings;
use Laramaster\Nuclues\Models\Pages;
use Auth;

class Site 
{
	public function __construct()
	{
		$this->middleware('web');
	}

	public static function profile()
	{
		$user = Usersetting::where('user_id',Auth::User()->id)->first();
		return $user;
	}

	public static function logo()
	{
		$logo =	Sitesettings::latest()->take(1)->first();
		if ($logo) {
			$image = asset('logo/'.$logo->image);
			return $image;
		}else{
			return null;
		}
		
	}

	public static function name()
	{
		$logo =	Sitesettings::latest()->take(1)->first();
		if ($logo) {
			return $logo->name;
		}else{
			return null;
		}
	}
}