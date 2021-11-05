<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = ['data' => $products];
        return response()->json($data);
    }

    public function showSingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $data = ['data' => $product];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->create($request->all());
        $data = ['data' => ["status" => "success", "msg" => "Product was created"]];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $data = ['data' => ["status" => "success", "msg" => "Product was edited"]];

        return response()->json($data, 201);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $data = ['data' => ["status" => "success", "msg" => "Product was deleted"]];

        return response()->json($data, 201);
    }
}
