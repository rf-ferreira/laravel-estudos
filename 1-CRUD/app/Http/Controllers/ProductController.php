<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('welcome', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $products = new Product;

        $products->product = $request->product; 
        $products->price = $request->price;
        $products->save();

        return redirect('/')->with('success', 'Added product: '. $products->product);

    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);

        return view('/edit', [
            'products' => $products
        ]);
    }

    public function update(Request $request)
    {
        $products = $request->all();
        Product::findOrFail($request->id)->update($products);

        return redirect('/')->with('success', 'Product edited: '. $request->product);
    }

    public function delete($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('/')->with('success', 'Product delete: '. $products->product);
    }
}
