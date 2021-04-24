<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            'data' => $category
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if($category) {
            return response()->json([
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category) {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->image = $request->image;
            $category->save();
            return response()->json([
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category) {
            $category->state = 'INACTIVO';
            $category->save();
            return response()->json([
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}
