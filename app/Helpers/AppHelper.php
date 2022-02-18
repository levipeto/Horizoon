<?php

namespace App\Helpers;

use App\Models\Product;

class AppHelper{
    
    //Get all categories from products:db
    public static function getCategories(){
        $categories = Product::select('category')->get();
        $cat_list = [];
        foreach ($categories as $category) {
            $category = json_decode($category,true);
            foreach ($category as $item) {
                array_push($cat_list,$item);
            }
        }
        $cat_list = array_unique($cat_list,SORT_STRING);
        return $cat_list;
    }
}