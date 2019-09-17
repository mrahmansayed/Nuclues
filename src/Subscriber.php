<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Subscribers;
/**
 * 
 */
class Subscriber 
{
	public static function add($email)
	{
		$contact = new Subscribers();
		$contact->email = $email;
		$contact->save();
	}
}
