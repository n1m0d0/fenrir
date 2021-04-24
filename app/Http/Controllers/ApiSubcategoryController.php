<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class ApiSubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $subcategories,
        ]);
    }

    public function store(Request $request)
    {
        $subcategory = Subcategory::create($request->all());
        return response()->json([
            'data' => $subcategory
        ]);
    }

    public function show($id)
    {
        $subcategory = Subcategory::find($id);
        if($subcategory) {
            return response()->json([
                'data' => $subcategory
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        if($subcategory) {
            $subcategory->category_id = $request->category_id;
            $subcategory->name = $request->name;
            $subcategory->description = $request->description;
            $subcategory->image = $request->image;
            $subcategory->save();
            return response()->json([
                'data' => $subcategory
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        if($subcategory) {
            $subcategory->state = 'INACTIVO';
            $subcategory->save();
            return response()->json([
                'data' => $subcategory
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}
