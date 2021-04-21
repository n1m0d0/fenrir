<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class ApiDetailController extends Controller
{
    public function index()
    {
        $details = Detail::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $details,
        ]);
    }

    public function store(Request $request)
    {
        $detail = Detail::create($request->all());
        return response()->json([
            'data' => $detail
        ]);
    }

    public function show($id)
    {
        $detail = Detail::find($id);
        if($detail) {
            return response()->json([
                'data' => $detail
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function update(Request $request, $id)
    {
        $detail = Detail::find($id);
        if($detail) {
            $detail->order_id = $request->order_id;
            $detail->product_id = $request->product_id;
            $detail->quantity = $request->quantity;
            $detail->save();
            return response()->json([
                'data' => $detail
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $detail = Detail::find($id);
        if($detail) {
            $detail->state = 'INACTIVO';
            $detail->save();
            return response()->json([
                'data' => $detail
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}