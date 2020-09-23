<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view('frontend.categories.show',compact('products'));
    }
}
