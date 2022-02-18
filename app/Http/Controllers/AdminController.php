<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function index(){
        
        //Users 
        $users = DB::table('users')->get();
        //Orders 
        $orders = DB::table('orders');
        //Products
        $products = DB::table('products')->get();
        
        //Get the total of capital gains
        $prices = [];
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            $cart = json_decode($order->cart,true);
            foreach($cart as $item){
             array_push($prices,$item['price']);
            }
        }
        
        $capital = round(array_sum($prices));
        return view('panel.index', compact('users','orders','capital','products'));
    }
    // Show all orders
    public function Orders(){
        $orders = Order::all();
        return view('panel.order.show',compact('orders'));
    }
  

}
