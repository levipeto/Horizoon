<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->ajax()){
            if($request->filter == 'all'){
              $data = Product::where('name','like',$request->search.'%')->get();
              if(count($data)>0){
                if(!empty($request->search)){
                  foreach($data as $item){
                    $link = route('product.show',$item->name);
                    $output = "<ul>
                    <li class='flex space-2 gap-2 text-gray-800 font-semibold text-base hover:bg-gray-200 p-1 cursor-pointer'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-gray-800 pt-1' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z' />
                    </svg>
                    <a href='{$link}'>{$item->name}</a><br>
                    </li>
                    </ul>";
                    echo $output;
                  }
                }
              }else{
                $output = "<div class='text-gray-800 font-semibold text-base pl-2'>No result</div>";
                echo $output;
              }
            }else{  
              $data = Product::where('category',$request->filter)->get();
              foreach ($data as $item) {
                if(count($data) > 0){
                  if(!empty($request->search)){
                  if( 
                  str_starts_with(strtolower($item->name), $request->search) || 
                  str_starts_with(strtoupper($item->name), $request->search) || 
                  str_ends_with(strtolower($item->name), $request->search) ||
                  str_ends_with(strtoupper($item->name), $request->search)
                  ) 
                  {
                    $link = route('product.show',$item->name);
                    $output = "<ul>
                    <li class='flex space-2 gap-2 text-gray-800 font-semibold text-base hover:bg-gray-200 p-1 cursor-pointer'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 text-gray-800 pt-1' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z' />
                    </svg>
                    <a href='{$link}'>{$item->name}</a><br>
                    </li>
                    </ul>";
                    echo $output;
                  }
                }
                }
            }
           }
 
        return;
 
     }
   }


}