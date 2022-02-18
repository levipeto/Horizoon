<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class ProductsController extends Controller
{
    /**
     * Show all products
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $product_name= Product::where('name',$name)->first();
        $product = Product::findOrFail($product_name->id);
        
        //Get images from db
        $images = json_decode($product->image,true);
        $reviews = Review::where('product',$product->name)->get();

         // Get all favourite product in the list
         $fav_liste = [];
         if(Auth::check() == true){
         $favourites = Auth::user()->favourites;
         foreach ($favourites as $is_favourite) {
             array_push($fav_liste,$is_favourite->name);
          }
         }

        return view('showproduct',compact('product','reviews','images','fav_liste'));
    }

    public function showCategories($name){

        $products = Product::where('category',$name)->get();

        $fav_list = [];

        // Only if the user is logged in
        if(Auth::check() == true){
         $favourites = Auth::user()->favourites;
         foreach ($favourites as $is_favourite) {
            array_push($fav_list,$is_favourite->name);
         }
        }

        return view('categories.show_category',compact('products','name','fav_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->Validation($request);

        $product = new Product();
        $product->name = trim($data['product-name']);
        $product->sale = trim($data['product-sale']);
        $product->category = trim($data['product-category']);
        $product->description = trim($data['product-description']);
        $product->price = $data['product-price'];
        $product->stock_qnt = $data['product-quantity'];

        // Image store
        if($request->hasfile('product-image')) {
            $images = [];
            foreach($request->file('product-image') as $file)
            {
                $destination_path = 'public/images';
                $img_name = time().'.'.$file->getClientOriginalName();
                $path = $file->storeAs($destination_path,$img_name);

                $img = Image::make($file);
                $img->resize(500,500,function($constraint){
                    $constraint->aspectRatio();
                })->save($destination_path.'/'.$img_name);

                array_push($images,$path);
            }
        }

        $imageStore = json_encode($images);
        $product->image = $imageStore;
        $product->save();

        return redirect()->back()->with('success','Your product have been uploaded!');
    }

    // Show update product section 
    public function updateProduct($id){
        $product = Product::where('id',$id)->first();
        return view('panel.products.update',compact('product'));
    }

    /**
     * Update products
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        
        $product->name = $request['product-name'];
        $product->price = $request['product-price'];
        $product->stock_qnt = $request['product-quantity'];
        $product->description = $request['product-description'];

        $images = [];

        // Add multiple image
        if($request->hasfile('product-image')) {
            foreach($request->file('product-image') as $file)
            {

                $destination_path = 'public/images';
                $img_name = time().'.'.$file->getClientOriginalName();
                $path = $file->storeAs($destination_path,$img_name);

                $img = Image::make($file);
                $img->resize(500,500,function($constraint){
                    $constraint->aspectRatio();
                })->save($destination_path.'/'.$img_name);
                
                array_push($images,$path);
            }
        }

        $old_images = json_decode($product->image,true);
        $current_images_json = array_merge($old_images,$images);
        $current_images = json_encode($current_images_json);
        $product->image = $current_images;
        
        try {
            $product->update();
        } catch (QueryException $exception) {
            dd($exception->getMessage());
        }

        return redirect()->back()->with('success','Your product have been uptaded!');
        
    }

    public function deleteImage(Request $request,$id){
        $product = Product::findOrFail($id);
        $key = $request->get('key');

        $images = json_decode($product->image,true);
        unset($images[$key]);
        $product->image = json_encode($images); 
        $product->update();
        return redirect()->back();
    }

    // Delete product
    public function delete($id){
        
        $product = new Product();
        $product->where('id',$id)->delete();

        return redirect()->back();
    }

    public function Validation(Request $request){
        return $request->validate([
            'product-name' => 'required',
            'product-sale' => 'required',
            'product-category' => 'required',
            'product-price' => 'required|min:1|max:20000',
            'product-description' => 'required|max:4000',
            'product-quantity' => 'required|min:1|max:100',
            'product-image' => 'nullable',
        ]);
    }

}
