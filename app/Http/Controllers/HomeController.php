<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Region;
use App\Models\Toifa;
use App\Models\Typeing;
use App\Models\File;
use App\Models\Malumot;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function users(){
        $User = array();
        $Users = User::where('type','User')->get();
        foreach ($Users as $key => $value) {
            $User[$key]['id'] = $value->id;
            $User[$key]['region'] = Region::find($value->region_id)==null?'Barcha hududlar' : Region::find($value->region_id)->region_name;
            $User[$key]['toifa'] = Toifa::find($value->toifa_id)->toifa_name;
            $User[$key]['name'] = $value->name;
            $User[$key]['email'] = $value->email;
            $User[$key]['created_at'] = $value->created_at;
        }
        return view('users',compact('User'));
    }
    public function user_create(){
        $Region = Region::get();
        $Toifa = Toifa::get();
        return view('user_create',compact('Region','Toifa'));
    }
    public function user_create_post(Request $request){
        $validate = $request->validate([
            'region_id' => 'required',
            'toifa_id' => 'required',
            'name' => 'required',
            'email' => 'required', 'unique:users',
        ]);
        User::create([
            'region_id' => $request->region_id,
            'toifa_id' => $request->toifa_id,
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'User',
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('status', "Yangi hodim qo'shildi. Parol: 12345678");
    }
    public function user_delete($id){
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('status', "Hodim o'chirildi");
    }
    public function index(){
        $Malumot = Malumot::get();
        $Search = array();
        foreach ($Malumot as $key => $value) {
            $Search[$key]['id'] = $value['id'];
            $Search[$key]['typing'] = Typeing::find($value->typeing_id)->type_name;
            $Search[$key]['region'] = Region::find($value->region_id)==null?'Barcha hududlar' : Region::find($value->region_id)->region_name;
            $Search[$key]['toifa'] = Toifa::find($value->toifa_id)==null?"Barcha hodimlar":Toifa::find($value->toifa_id)->toifa_name;
            $Search[$key]['title'] = $value['title'];
            $Search[$key]['image'] = $value['image'];
            $Search[$key]['created_at'] = $value['created_at'];
        }
        return view('home',compact('Search'));
    }
    public function new_post(){
        $Region = Region::get();
        $Toifa = Toifa::get();
        $Typeing = Typeing::get();
        return view('new_post',compact('Typeing','Toifa','Region'));
    }
    public function new_post_create(Request $request){
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'region_id' => 'required|string',
            'toifa_id' => 'required|string',
            'typeing_id' => 'required|string',
            'description' => 'required|string',
        ]);
        $malumot = new Malumot();
        $malumot->title = $validate['title'];
        $malumot->region_id = $validate['region_id'];
        $malumot->toifa_id = $validate['toifa_id'];
        $malumot->typeing_id = $validate['typeing_id'];
        $malumot->image = '01.jpg';
        $malumot->description = $validate['description'];
        $malumot->save();
        return redirect()->back()->with('status', "Post yuklandi");
    }
    public function home_show($id){
        $Malumot = Malumot::find($id);
        $about = array();
        $about['id'] = $Malumot['id'];
        $about['typing'] = Typeing::find($Malumot->typeing_id)->type_name;
        $about['region'] = Region::find($Malumot->region_id)==null?'Barcha hududlar' : Region::find($Malumot->region_id)->region_name;
        $about['toifa'] = Toifa::find($Malumot->toifa_id)==null?"Barcha hodimlar":Toifa::find($Malumot->toifa_id)->toifa_name;
        $about['title'] = $Malumot['title'];
        $about['description'] = $Malumot['description'];
        $about['image'] = $Malumot['image'];
        $about['created_at'] = $Malumot['created_at'];
        $about['updated_at'] = $Malumot['updated_at'];
        return view('home_show',compact('about'));
    }
    public function home_show_update($id){
        $Region = Region::get();
        $Toifa = Toifa::get();
        $Typeing = Typeing::get();
        $Malumot = Malumot::find($id);
        return view('update_post',compact('Typeing','Toifa','Region','Malumot'));
    }
    public function home_show_update_post(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'region_id' => 'required|string',
            'toifa_id' => 'required|string',
            'typeing_id' => 'required|string',
            'description' => 'required|string',
        ]);
        $Malumot = Malumot::find($id);
        $Malumot->title = $request->title;
        $Malumot->region_id = $request->region_id;
        $Malumot->toifa_id = $request->toifa_id;
        $Malumot->typeing_id = $request->typeing_id;
        $Malumot->description = $request->description;
        $Malumot->save();
        return redirect()->back()->with('status', "O'zgarishlar saqlandi");
    }
    public function updates_images(Request $request,$id){
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096', 
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $Malumot = Malumot::find($id);
            $Malumot->image = $imageName;
            $Malumot->save();
            return back()->with('status', 'Rasm muvaffaqiyatli yuklandi!');
        }
        return back()->with('error', 'Rasm yuklashda xatolik yuz berdi.');
    }

}
