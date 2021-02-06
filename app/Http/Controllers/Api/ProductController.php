<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return  Product::all();
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return response()->json('created',200);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id,ProductRequest $request)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        return response()->json('updated',200);
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return response()->json('deleted',200);
    }
}
