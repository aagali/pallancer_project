<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats= Auth::user()->products;
        $total = 0;
        foreach($cats as $cart){
            $total+=$cart->price * $cart->pivot->count;

        }
        return view('checkout' ,
    [
        'carts' =>$cats,
        'total' => $total
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Auth::user()->products()->where('product_id' , $request->product_id);
      $product=  Auth::user()->products()->where('product_id' , $request->product_id)->first();
      if($product){
          $cart = Cart::find($product->pivot->id);//pivot بتجيب الي داخل العلاقة
          $cart->count = ++$cart->count;
          $cart->save();
      }else{
          $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->user_id = Auth::id();
        $cart->count = 1;
        $cart->save();
      }
       return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
