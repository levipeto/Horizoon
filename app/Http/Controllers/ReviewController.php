<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class ReviewController extends Controller
{

    public function store(Request $request){

        //User orders 
        $user_order = Auth::user()->order;
        $myorders = [];

        //Get all product names from cart
        foreach ($user_order as $item) {
          $cart = json_decode($item->cart,true);
          foreach($cart as $item){
            $prod_name = $item['name'];
            array_push($myorders,trim($prod_name));
          }
        }

        if(in_array(trim($request['product-name']),$myorders)){
            $data = $request->validate([
                'rating' => 'required',
                'comment' => 'required|string',
                'product-name' => 'required'
            ]);
            $review = new Review();
            $review->user_id = Auth::user()->id;
            $review->rating = $data['rating'];
            $review->comment = $data['comment'];
            $review->product = $data['product-name'];
            $review->author = Auth::user()->fullname;
            $review->save();

            // Product average reviews calculation
            $review = Review::where('product',$data['product-name'])->get();
            $average = [];

            foreach($review as $item){
            array_push($average,$item->rating);
            }

            $calc = array_sum($average)/((count($average)));
            $average_review = floor($calc);
            // Update product average
            DB::table('products')->where('name',$request['product-name'])->update(array('average_review' => $average_review));
            return redirect()->back();
        }else{
            return Redirect::back()->withErrors(['review-error' => 'You must buy the product before make the review']);
        }
     }


}
