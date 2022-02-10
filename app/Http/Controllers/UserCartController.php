<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMade;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class UserCartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $carts = Auth::user()->cart;

        $product = Product::all();
        return view('user.cartshop.index',compact('carts','product'));
    }

    public function store(Request $request,$name){

        $request->validate([
            "quantity" => "min:1|max:{$request['quantity']}",
        ]);

        // Get current product
        $product_name= Product::where('name',$name)->first();
        $product = Product::findOrFail($product_name->id); 

        //Get user cart-db
        $user = Auth::user();
        $cart = new UserCart();
        $user_cart = Auth::user()->cart;
        $current_product_cart = $user_cart->where('name',$product->name)->first();

        if(!$current_product_cart){
            //Insert first product in the cart
            $cart->name = $product->name;
            $cart->price = $product->price;
            $cart->image = $request['image'];
            $cart->quantity = $request['quantity'];
            $cart->user_id = $user->id;
            $cart->save();
        }

        if($current_product_cart){
            // Updare quantity of existent product
            $new_quantity = (int)$request['quantity']+(int)$current_product_cart->quantity;
            $current_product_cart->update(array('quantity' => $new_quantity));
        }


        return redirect()->back()->with('success','Your product have been uploaded!');
    }

    //Delete single product from user cart
    public function delete(Request $request,$id){
      $user = Auth::user();
      $cart = $user->cart;
      $item = $cart->where('id',$id)->first();
      $item->delete();
      return redirect()->back();
    }

    //Clear all product from user cart
    public function clearCart(){
        $cart = new UserCart();
        $cart->where('user_id',Auth::user()->id)->first();
        $cart::truncate();
        return redirect()->back();
    }

}
