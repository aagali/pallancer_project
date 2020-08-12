<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.Products',
    [
        'products' =>$product->paginate(5)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $this->check_Validate($request);

        $img_path=null;

        if($request ->hasFile('img') && $request->file('img')->isValid()){
            $imag = $request->file('img');
            $img_path =  $imag->store('products' , 'public');
        }
        $data = $request->all();
        $data['img']= $img_path;
        $product=Product::create($data);
        return redirect()->route('product.index')->with('succsess' , "Product \"{$product->name}\" Create!");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.editProduct' , [
            'product' =>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->check_Validate($request);
        $data = $request->except('img');
        if($request->hasFile('img')){
            $imag = $request->file('img')->store('products' , 'public');
            Storage::disk('public')->delete($product->img);
            $data['img']=$imag;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('succsess' , "Product \"{$product->name}\" Update!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->img);

        return redirect()->back();
    }
    protected function check_Validate(Request $request){
        $request->validate( [
            'name' =>'required|max:100|min:5',
            'title' =>'required|max:100|min:5',
            'suptitle' => 'required|max:80|min:5',
            'description' => 'required|max:250|min:5',
            'price' =>'required',
        ]); 
    }
}
