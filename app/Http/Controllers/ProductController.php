<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product');

    }
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:1',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->only(['name', 'description', 'price', 'quantity']);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('products.create')->with('status', 'Product added successfully!');
}

  public function index()
{
    
    $products = Product::all();
    
    return view('product.index', compact('products')); 
}
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product.show', compact('product'));
}

}
