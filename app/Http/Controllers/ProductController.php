<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
        $products = Product::all();

        return response()->json($products);
        //return view('home',compact('products'));
    }

    public function create(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description; 
        $product->save();

        return response()->json($product);
     
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
     
    public function update(Request $request, $id)
    { 
        $product= Product::find($id);   
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->update();

        return response()->json($request);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return response()->json('product removed successfully');
    }

}
