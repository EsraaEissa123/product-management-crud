<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = product::latest()->paginate(20);
        return view('products.index', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    
    public function search(Request $request)
    {
        $products = Product::where('title', 'like', "%$request->keyword%")->paginate(20);
        return response()->json($products);
    }
    
    public function store(ProductRequest $request)
    {
        $image_path = $request->file('image')->store('image', 'public');
        $data       = Product::create(['image' => $image_path] + $request->validated());
        return redirect()
         ->route('products.index')
         ->with('success','product created successfully.');
    }
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
   
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->image) {
            $image_path = $request->file('image')->store('image', 'public');
            $product->update(['image' => $image_path] + $request->validated());
        }
        
        return redirect()->route('products.index')
                         ->with('success','product updated successfully');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                         ->with('success','product deleted successfully');
    }
}
