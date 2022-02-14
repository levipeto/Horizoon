<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMade;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserCart;
use Exception;
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
        return view('stripe',compact('total'));
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cart = Auth::user()->cart;

        try {
    
            foreach($cart as $product)
            {
                $current_product = Product::where('name',$product->name)->first();
    
                //Stock quantity update
                $update_quantity = (int)$current_product->stock_qnt - (int)$product->quantity;
                $current_product->stock_qnt = $update_quantity;
                $current_product->update(array('stock_qt' => $current_product->stock_qnt));
            }
    
            $amount = (int) str_replace('.', '', $request->get('total'));
            $random_key = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,30);
      
            $secret_key = env('STRIPE_SECRET');
            \Stripe\Stripe::setApiKey($secret_key);
      
            $stripe = new \Stripe\StripeClient($secret_key);
            
            // Create new customer and charges object
            $stripe->customers->create([
                'name' => Auth::user()->fullname,
                'email' => Auth::user()->email,
            ]);
    
            if($cart->count() > 0){
                $stripe->charges->create([
                    'amount' => $amount * 10,
                    'currency' => 'eur',
                    'source' => 'tok_amex', // obtained with Stripe.js
                    'description' => 'thank you for purchasing in Horizoon!'],
                ['idempotency_key' => $random_key,
               ]);
            }
         
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
            
            //send email after purchase
            $details = $request->get('name')." ".$request->get('total')."€";
            Mail::to(Auth::user()->email)->send(New PurchaseMade($details));
    
            return redirect()->route('success-payment');
    
           } catch (Exception $ex) {
              return $ex->getMessage();
           }
    }


}


