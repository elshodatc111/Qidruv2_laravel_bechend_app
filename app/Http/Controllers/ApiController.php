<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Toifa;
use App\Models\Typeing;
use App\Models\File;
use App\Models\Malumot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ApiController extends Controller{

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => 200,
                'region_id' => $user->region_id,
                'toifa_id' => $user->toifa_id,
                'type' => $user->type,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login yoki parol noto\'g\'ri',
            ], 401);
        }
    }

    public function home(){
        $region_id = auth()->user()->region_id;
        $toifa_id = auth()->user()->toifa_id;
        $Malumot = Malumot::whereIn('region_id', [1, $region_id])->whereIn('toifa_id', [1, $toifa_id])->get();
        $res = array();
        foreach ($Malumot as $key => $value) {
            $res[$key]['id'] = $value->id;
            $res[$key]['title'] = $value->title;
            $res[$key]['image'] = $value->image;
            $res[$key]['region'] = Region::find($value->region_id)==null?"Barcha hududlar":Region::find($value->region_id)->region_name;
            $res[$key]['type'] = Typeing::find($value->typeing_id)->type_name;
        }
        return $res;
    }
    public function show($id){
        $Malumot = Malumot::find($id);
        $Malumot['refion'] = Region::find($Malumot->region_id)==null?"Barcha hududlar":Region::find($Malumot->region_id)->region_name;
        $Malumot['type'] = Typeing::find($Malumot->typeing_id)->type_name;
        return $Malumot;
    }
}





/*
    {
        "id": 1,
        "typeing_id": 3,
        "region_id": 1,
        "toifa_id": 1,
        "title": "ss",
        "description": "<p>sss</p>",
        "image": "1732704193_1111111111111.jpg",
        "created_at": "2024-11-27T09:23:25.000000Z",
        "updated_at": "2024-11-27T10:43:13.000000Z"
    },
*/