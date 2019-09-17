<?php 

namespace Laramaster\Nuclues;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laramaster\Nuclues\Models\Orders;
use Laramaster\Nuclues\Models\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Auth;
/**
 * 
 */
class Order 
{
	public static function add($data=[])
	{
		$order = new Orders();
		$order->user_id = $data['user_id'];
		$order->first_name = $data['first_name'];
		$order->last_name = $data['last_name'];
		$order->email = $data['email'];
		$order->phone = $data['phone'];
		$order->address = $data['address'];
		$order->country = $data['country'];
		$order->postal_code = $data['postal_code'];
		$order->city = $data['city'];
		$order->state = $data['state'];
		$order->approved = 1;
		$order->payment_type = $data['payment_type'];
		$order->delivery_status = "pending";
		$order->amount = Cart::total();
		$order->currency_type = $data['currency_type'];
		$order->save();

		 foreach (Cart::get() as $item) {
                $order->products()->attach($item['id']);

            }

            foreach (Cart::get() as $product) {
            	$products = Product::where('id',$product['product_id'])->get();
            	foreach ($products as $key => $value) {
            		$value->decrement('quantity',$product['qty']);
                    $value->increment('sell_count',1);
            		$value->save();
            	}
            }


           try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => Currencies::type(),
                'source' => $data['stripeToken'],
                'description' => 'Order',
                'receipt_email' => $data['email'],
                'metadata' => [
                	'quantity' => Cart::count(),
                ],
            ]);

        } catch (Exception $e) {


        }

        $payment_status = Orders::find($order->id);
        $payment_status->payment_status = 1;
        $payment_status->save();
	}


    public static function get()
    {
       $order = Orders::where('user_id',Auth::User()->id)->get();
       return $order;
    }
}
