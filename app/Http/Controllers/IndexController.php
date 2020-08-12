<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Product $product){
        return view('products' ,[
            'product' =>$product->latest()->get()
        ]);
    }
    public function showw($id){
        return view('product')->with('product',Product::find($id));
    }

    public function search(Request $request){
        $product = Product::where('name' , 'like' ,'%' . $request->name . '%' )->get();
        return view('_products' , [
            'product' =>$product
        ]);
    }
}
