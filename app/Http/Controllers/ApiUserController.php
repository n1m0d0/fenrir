<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::where('state', 'ACTIVO')->get();
        return response()->json([
            'data' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->profile_id = $request->profile_id;        
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->state = $request->state;
        $user->save();
        return response()->json([
            'data' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user) {
            return response()->json([
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user) {
            $user->profile_id = $request->profile_id;        
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->save();
            return response()->json([
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }  
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            $user->state = 'INACTIVO';
            $user->save();
            return response()->json([
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'error' => 'data not found'
            ], 404);
        }
    }
}
