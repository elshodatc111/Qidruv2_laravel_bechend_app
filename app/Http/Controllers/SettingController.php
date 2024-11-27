<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Region;
use App\Models\Toifa;
use App\Models\Typeing;

class SettingController extends Controller{
    public function setting(){
        $Region = Region::get();
        $Toifa = Toifa::get();
        $Typeing = Typeing::get();
        return view('setting',compact('Region','Toifa','Typeing'));
    }
    public function setting_delete(Request $request, $id){
        if($request->type=='region_name'){
            $Region = Region::find($id);
            $Region->delete();
            return redirect()->back()->with('status', "Hudud o'chirildi");
        }elseif($request->type=='toifa_name'){
            $Region = Toifa::find($id);
            $Region->delete();
            return redirect()->back()->with('status', "Lavozim o'chirildi");
        }else{
            $Region = Typeing::find($id);
            $Region->delete();
            return redirect()->back()->with('status', "Ma'lumot turi o'chirildi");
        }
    }
    public function setting_create_rigion(Request $request){
        $validate = $request->validate([
            'region_name' => 'required',
        ]);
        Region::create([
            'region_name' => $request->region_name
        ]);
        return redirect()->back()->with('status', "Yangi hudud qo'shildi");
    }
    public function setting_create_toifa(Request $request){
        $validate = $request->validate([
            'toifa_name' => 'required',
        ]);
        Toifa::create([
            'toifa_name' => $request->toifa_name
        ]);
        return redirect()->back()->with('status', "Yangi lavozim qo'shildi");
    }
    public function setting_create_typing(Request $request){
        $validate = $request->validate([
            'type_name' => 'required',
        ]);
        Typeing::create([
            'type_name' => $request->type_name
        ]);
        return redirect()->back()->with('status', "Yangi ma'lumot turi qo'shildi");
    }
}
