<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('user.settings',compact('orders'));
    }

    public function updateData(Request $request){

      $id = Auth::user()->id;
      $user = User::findOrFail($id);

      $request->validate([
        'fullname' => ["string","regex:/^[a-z A-Z0-9\\/\\\\.'\"]+$/"],
        'email' => 'string', 'email', 'max:255', 'unique:users',
        'phone' => 'regex:/[0-9]{9}/',
        'city' => 'string',
      ]);


      if($request->input('fullname')){
            $user->update(['fullname' => $request->input('fullname')]);
            $user->save();
      }
      
      if($request->input('email')){
          $user->update(['email' => $request->input('email')]);
          $user->save();
      }

      if($request->input('phone')){
          $user->update(['phone' => $request->input('phone')]);
          $user->save();
      }

      if($request->input('address')){
          $user->update(['address' => $request->input('address')]);
          $user->save();
      }

      if($request->input('city')){
        $user->update(['city' => $request->input('city')]);
        $user->save();
    }
      
       return redirect()->back();

    }

    public function imageUpload(Request $request){

      $id = Auth::user()->id;
      $user = User::findOrFail($id);

      if($request->hasFile('profile_image')){  
          $data = $request->file('profile_image')->store('public/images');
          $user->image = $data;
          $user->update();
      } 
      
      return redirect()->back();
    }

    public function updatePassword(Request $request){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $userPassword =  $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }
        
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success','password successful');
        
    }

    /**
     * Favourites products
     */
    public function showFavoritesProd(){
      $favourites = Auth::user()->favourites;
      return view('user.favourites',compact('favourites'));
    }

    public function storeFavoritesProd($id){
       $favourites = new Favourite();
       $product = DB::table('products')->where('id', $id)->first();
       $user_fav = Auth::user()->favourites;
       
       $favourites->name = $product->name;
       $favourites->price = $product->price;
       $favourites->image = $product->image;
       $favourites->user_id = Auth::user()->id;

       $current_prod = $user_fav->where('name',$product->name)->first() ? true : false;

       if($current_prod === false){
          $favourites->save();
       }else{
          return redirect()->back();
       }

       return redirect()->back();

    }  

    public function deleteItem($id){
      $favourites = Auth::user()->favourites;
      $item = $favourites->where('id',$id)->first();
      if($item->delete()) return redirect()->back()->with(['message' => 'Item deleted successfullys']);
      else return redirect()->back();
    }

    public function clearList(){
      $clear = DB::table('favourites')->where('user_id',Auth::user()->id)->delete();
      if($clear) return redirect()->back()->with(['message' => 'List deleted successfullys']);
      else return redirect()->back();
    }

    public function addItemToCart(){
      
    }

    // This function is only for real version
    public function addPaymentCart(Request $request){
          return redirect()->back();
    }

    

}
