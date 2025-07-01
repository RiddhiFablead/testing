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
        $data=$request->all();
        if($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        
        Product::create($data);
        return redirect()->route('products.index')->with('status', 'Product added successfully!');
    }
}
