<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Tests\TestCase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Type;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get products from db (only if they have 4 or more stars and are not on offeronly if they have 4 or more stars and are not on offer)
        $products = Product::where('average_review','>=',4)->where('sale',false)->get();
        // Get best product on sale
        $best_offer_product = Product::where('sale',true)->first();

        // Get all favourite product in the list
        $fav_liste = [];

        // Only if the user is logged in
        if(Auth::check() == true){
         $favourites = Auth::user()->favourites;
         foreach ($favourites as $is_favourite) {
            array_push($fav_liste,$is_favourite->name);
         }
        }


        return view('home',compact('products','best_offer_product','fav_liste'));
    }

}
