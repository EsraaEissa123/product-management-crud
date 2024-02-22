<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::latest()->paginate(20);
        return view('products.index', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $data = Product::create(['image' => $imageName] + $request->validated());
        return redirect()
         ->route('products.index')
         ->with('success', 'product created successfully.');
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('image', 'public');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            if ($product->image) {
                $imagePath = 'images/' . $product->image;
                Storage::disk('public')->delete($imagePath);
            }
            $product->update(['image' => $imageName] + $request->validated());
        } else {
            $product->update($request->validated());
        }

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully');

    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                         ->with('success', 'product deleted successfully');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%$keyword%")
                  ->orWhere('description', 'like', "%$keyword%");
        })->paginate(20);
        return response()->json($products);
    }
}
