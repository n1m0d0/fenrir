<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product) {
            return response()->json([
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product) {
            $product->subcategory_id = $request->subcategory_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->save();
            return response()->json([
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            $product->state = 'INACTIVO';
            $product->save();
            return response()->json([
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}
