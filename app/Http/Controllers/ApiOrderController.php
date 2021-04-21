<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $orders,
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json([
            'data' => $order
        ]);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if($order) {
            return response()->json([
                'data' => $order
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if($order) {
            $order->user_id = $request->user_id;
            $order->name = $request->name;
            $order->nit = $request->nit;
            $order->save();
            return response()->json([
                'data' => $order
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if($order) {
            $order->state = 'INACTIVO';
            $order->save();
            return response()->json([
                'data' => $order
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}
