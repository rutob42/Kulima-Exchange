<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|',
            'category'=>'required|string|max:255',
            'price'=>'required|numeric',
            'quantity'=>'required|integer'
        ]);

        Product::create([
            'name'=>$request->name,
            'category'=>$request->category,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'user_id'=>auth()->id //link product to the farmer
            ]);
        return redirect()->route('products.index')->with('Success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show', ['product' => Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','DProduct deleted successfully!');   
    }

    public function marketplace()
    {
        $products = Product::where('quantity', '>', 0)->get(); //only show products in stock
        return view('products.marketplace', compact('products'));
    }
}
