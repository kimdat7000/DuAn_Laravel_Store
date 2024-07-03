<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiProductModel as Products;

class apiProductController extends Controller
{
    public function index()
    {
        return Products::all();
    }

    public function products_lasted()
    {
        return Products::orderBy('id', 'desc')->limit(8)->get();
    }

    public function products_bestseller()
    {
        return Products::orderBy('sold', 'desc')->limit(8)->get();
    }

    public function show($id)
    {
        return Products::find($id);
    }

    public function store(Request $request)
    {
        $product = Products::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
