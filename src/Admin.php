<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;

class Admin 
{
	public static function is()
	{
		$user = Auth::User()->email == config('nuclues.admin_email');
		return $user;
	}
}
