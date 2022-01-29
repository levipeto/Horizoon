<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMade;
use App\Models\Order;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RecursiveTreeIterator;

use Stripe;
use Stripe\Exception\CardException;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($total)
    {
        $cart = Auth::user()->cart;

        foreach($cart as $product)
        {
            $data = [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity
            ];

            $data = json_encode($data);
        }

        return view('stripe',compact('total'));
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
       try {
        $amount = (int) str_replace('.', '', $request->get('total'));
        $random_key = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,30);
  
        $secret_key = env('STRIPE_SECRET');
        \Stripe\Stripe::setApiKey($secret_key);
  
        $stripe = new \Stripe\StripeClient($secret_key);
        
        // Create new charges object
        $stripe->charges->create([
                 'amount' => $amount * 10,
                 'currency' => 'eur',
                 'source' => 'tok_amex', // obtained with Stripe.js
                 'description' => 'thank you for purchasing in Horizoon!'],
                 ['idempotency_key' => $random_key,
        ]);
     
        //Add order in use list
        $cart_user = Auth::user()->cart;
        $userId = Auth::user()->id;
      
        $order = new Order();

        $order->cart = json_encode($cart_user);
        $order->user_id = $userId;
        $order->status = true;
        $order->total = $amount;
        $order->order_key = rand(0,1000).rand(0,1000).rand(0,1000).rand(0,1000).rand(0,1000);
        $order->save();

        // Clear user cart
        $cart = new UserCart();
        $cart->where('user_id',Auth::user()->id)->first();
        $cart::truncate();
        
        //Email send
        $details = $request->get('name')." ".$request->get('total')."€";
        Mail::to(Auth::user()->email)->send(New PurchaseMade($details));

       return redirect()->route('success-payment');

       } catch (\Stripe\Exception\CardException $err) {
          dd($err);
       }
    }

    public function verifyCard(){

        $stripe = new \Stripe\StripeClient(
            'sk_test_51HS0tCKZ8Rg0kXgncd9MHZeqSMBX8zBcn5f8YijsFHCN82nR9hiLhSXSwzH4MVYcf6sEuIZDgTzOsqQYex0cj9KQ00kZvNG0Hk'
          );
        $customer = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs)',
        ]);
    }

}


