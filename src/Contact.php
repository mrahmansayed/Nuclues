<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Contacts;
/**
 * 
 */
class Contact 
{
	public static function add($name=null,$email,$subject=null,$message=null)
	{
		$contact = new Contacts();
		$contact->name = $name;
		$contact->email = $email;
		$contact->subject = $subject;
		$contact->message = $message;
		$contact->save();
	}
}
